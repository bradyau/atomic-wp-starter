# Private review notes

This file is for the pre-publication review and should be removed from the first public release.

## Decisions to confirm

- **Public identity:** Confirmed as Brad Yau with `bradyau.com`. Atomic Studio may be referenced in supporting copy, but it is not the theme author.
- **Minimum versions:** WordPress 6.4 and PHP 8.0 keep the codebase modern without targeting only the newest hosts.
- **Front-page sample:** Confirmed to remain. The fallback copy demonstrates the layout only when the assigned page has no content.
- **Editor CSS:** The editor loads the front-end stylesheet for useful visual parity. Confirm it does not over-style the block editor during LocalWP review.
- **Theme screenshot:** The current screenshot is an Atomic Studio-branded coded preview. Replace it with a LocalWP capture if the rendered theme meaningfully differs.
- **Blog templates:** Single and archive templates are included because they are expected of a reusable starter, even though the primary use case is marketing sites.

## Manual checks still required

- Install and activate in a clean LocalWP site.
- Assign and test the intentionally single-level primary menu.
- Review front page, standard page, information page, single, archive, search, and 404 at desktop, tablet, and 390 × 844.
- Test keyboard focus order, Escape dismissal, 200% zoom, 400% reflow, reduced motion, and no-JavaScript navigation.
- Test the block patterns in the editor with long headings and real images.
- Test the comments master switch off and on, including post-level controls, moderation, threading, and feed/API behavior.
- Test the login screen with no site logo and with a client logo at desktop and mobile widths.
- Test one chosen SEO plugin across the front page, pages, posts, archives, search, and 404 views. Confirm a single metadata owner.
- Run Lighthouse and an automated accessibility scan against the LocalWP or Playground preview.
- Confirm the package installs as one theme directory and contains no review-only files.

## Automated checks completed

- `theme.json` parses successfully.
- The front-end JavaScript and both shell scripts pass syntax checking.
- The packaging script creates a single-root installable ZIP and `unzip` reports no integrity errors.
- Workflow permissions are read-only; the runner image and timeout are explicit.
- Checkout and artifact upload Actions are commit-pinned; PHP setup uses an exact release.
- Composer auditing and monthly Dependabot checks are included in CI.
- The previous GitHub Actions run passed PHP 8.0 syntax checks, Composer dependency installation and security audit, repository verification, WordPress Coding Standards, deterministic ZIP packaging, and artifact upload at commit `ad19757`.
- Checkout, PHP setup, and artifact upload are pinned to reviewed immutable commits; the PHP setup pin includes the 2.37.1+ security fixes.
- Previous successful run: https://github.com/bradyau/atomic-wp-starter/actions/runs/33096594485
- A fresh green run is required for the lean-defaults and Atomic Studio branding changes.
- Clean LocalWP installation and the manual browser/editor/accessibility checks remain hard pre-publication requirements.

## Publication gate

- Remove `REVIEW.md` from the repository or convert resolved items into issues.
- Confirm the repository URL and changelog comparison link.
- Capture or approve `screenshot.png` at exactly 1200 × 900.
- Convert the initial `[Unreleased]` changelog section into a dated `1.0.0` entry immediately before tagging.
- Tag `v1.0.0` only after the install, coding-standards, visual, responsive, and accessibility checks pass. The stable version is intentional and therefore makes every remaining gate mandatory.

## GitHub repository settings

- Issues are enabled for focused bug reports and compatibility problems.
- Discussions are disabled; the project does not need a community forum at launch.
- Wiki is disabled; durable documentation belongs in the reviewed repository.
