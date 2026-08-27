# Changelog

All notable changes are documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and versioning follows [Semantic Versioning](https://semver.org/).

## [Unreleased]

## [1.0.0] - 2026-08-27

### Added

- Initial classic/hybrid theme architecture
- Core templates and information-page template
- Theme tokens, responsive layout, and accessible primary navigation
- Editorial hero, split content, and call-to-action block patterns
- Repository verification, coding standards, and deterministic ZIP packaging
- The supplied Atomic Studio lockup as the theme-browser image, plus Atomic Studio login fallback branding
- An opt-in native comment system controlled from Settings > Discussion

### Changed

- Expanded the lean defaults to remove emoji compatibility assets across public and admin screens
- Made template headings explicit so reusable patterns do not compete for the primary H1
- Documented the boundary between the theme, WordPress core, and a dedicated SEO plugin

### Security

- Disabled pingbacks and trackbacks, including XML-RPC methods, response headers, and outbound pings
- Removed comment API surfaces while comments are disabled

[Unreleased]: https://github.com/bradyau/atomic-wp-starter/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/bradyau/atomic-wp-starter/releases/tag/v1.0.0
