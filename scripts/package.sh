#!/usr/bin/env bash
set -euo pipefail

repo_root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
theme_slug="atomic-wp-starter"
output_dir="$repo_root/dist"

for required_command in zip unzip; do
  if ! command -v "$required_command" >/dev/null 2>&1; then
    echo "$required_command is required to package the theme." >&2
    exit 1
  fi
done

build_root="$(mktemp -d)"
theme_dir="$build_root/$theme_slug"

cleanup() {
  rm -rf "$build_root"
}
trap cleanup EXIT

mkdir -p "$theme_dir" "$output_dir"

theme_entries=(
  404.php
  archive.php
  assets
  CHANGELOG.md
  comments.php
  CONTRIBUTING.md
  footer.php
  front-page.php
  functions.php
  header.php
  inc
  index.php
  LICENSE
  page-info.php
  page.php
  patterns
  README.md
  screenshot.png
  search.php
  searchform.php
  single.php
  style.css
  template-parts
  theme.json
)

for entry in "${theme_entries[@]}"; do
  if [[ ! -e "$repo_root/$entry" ]]; then
    echo "Cannot package missing entry: $entry" >&2
    exit 1
  fi
  cp -R "$repo_root/$entry" "$theme_dir/"
done

archive="$output_dir/$theme_slug.zip"
rm -f "$archive"
(
  cd "$build_root"
  zip -q -r "$archive" "$theme_slug"
)

if unzip -Z1 "$archive" | awk -F/ -v root="$theme_slug" '$1 != root { exit 1 }'; then
  printf 'Created %s\n' "$archive"
else
  echo "Package contains an unexpected top-level entry." >&2
  exit 1
fi
