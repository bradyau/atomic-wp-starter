#!/usr/bin/env bash
set -euo pipefail

repo_root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$repo_root"

if ! command -v php >/dev/null 2>&1; then
  echo "PHP is required to verify the theme." >&2
  exit 1
fi

required_files=(
  404.php
  archive.php
  assets/css/site.css
	assets/css/login.css
	assets/brand/atomic-studio-mark-black.svg
  assets/js/site.js
	comments.php
  footer.php
  front-page.php
  functions.php
  header.php
  index.php
  page-info.php
  page.php
  search.php
  searchform.php
  single.php
  style.css
  theme.json
)

for required_file in "${required_files[@]}"; do
  if [[ ! -f "$required_file" ]]; then
    echo "Missing required theme file: $required_file" >&2
    exit 1
  fi
done

while IFS= read -r php_file; do
  php -l "$php_file" >/dev/null
done < <(find . -type f -name '*.php' -not -path './vendor/*' -not -path './dist/*' | sort)

php -r '
$data = json_decode(file_get_contents("theme.json"), true, 512, JSON_THROW_ON_ERROR);
if (($data["version"] ?? null) !== 2) {
    fwrite(STDERR, "theme.json must use schema version 2.\n");
    exit(1);
}
'

if ! grep -q '^Text Domain: atomic-wp-starter$' style.css; then
  echo "Theme text domain is missing or inconsistent." >&2
  exit 1
fi

if ! grep -Fq "add_theme_support( 'title-tag' );" functions.php || \
	! grep -Fq "add_theme_support( 'automatic-feed-links' );" functions.php || \
	! grep -Fq '<?php wp_head(); ?>' header.php || \
	! grep -Fq '<?php language_attributes(); ?>' header.php; then
  echo "The core discovery and document-head foundation is incomplete." >&2
  exit 1
fi

if grep -R -E "<title>|rel=['\"]canonical['\"]|application/ld\\+json|<meta[^>]+robots" \
  --include='*.php' --exclude-dir=vendor --exclude-dir=dist . >/dev/null; then
  echo "Theme PHP must not compete with WordPress core or an SEO plugin for metadata ownership." >&2
  exit 1
fi

if grep -R -E '<h1|\"level\":1' --include='*.php' patterns >/dev/null; then
  echo "Reusable block patterns must not claim the template-owned H1." >&2
  exit 1
fi

if ! grep -Fq 'atomic_wp_starter_enable_comments' inc/site-features.php || \
	! grep -Fq "unset( \$methods['pingback.ping']" inc/site-features.php || \
	! grep -Fq "add_filter( 'emoji_svg_url', '__return_false' );" inc/site-features.php || \
	! grep -Fq 'comments_template();' single.php || \
  ! grep -Fq 'comments_template();' page.php; then
  echo "Lean discussion, pingback, or emoji safeguards are incomplete." >&2
  exit 1
fi

theme_version="$(sed -n 's/^Version: //p' style.css | head -n 1)"
if [[ -z "$theme_version" ]] || ! grep -Fq "define( 'ATOMIC_WP_STARTER_VERSION', '$theme_version' );" functions.php; then
  echo "Theme version is missing or inconsistent between style.css and functions.php." >&2
  exit 1
fi

if find . -type f \( -name '*.sql' -o -name '.env' -o -name 'wp-config.php' \) -not -path './vendor/*' -print -quit | grep -q .; then
  echo "A sensitive or environment-specific file is present." >&2
  exit 1
fi

echo "Theme verification passed."
