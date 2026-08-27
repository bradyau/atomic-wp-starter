# Atomic WP Starter

Atomic Studio's focused, lightweight WordPress theme starter for accessible, high-performance marketing sites.

The starter favors semantic PHP templates, native CSS, small vanilla JavaScript, and WordPress-owned content. It provides enough structure to begin a considered project without bringing a page builder or front-end framework along for the ride.

## Why this starter is different

Most themes are finished visual products or broad frameworks. Atomic WP Starter is a focused delivery foundation. It begins with durable content ownership, a small runtime, clear template responsibilities, and repeatable release checks, then leaves the project-specific design and content model open.

- No page builder, CSS framework, JavaScript framework, or production Composer dependency
- Lean defaults that remove discussion, pingback, trackback, and emoji compatibility overhead until it is needed
- Native WordPress content, menus, media, patterns, and design tokens instead of proprietary page data
- Semantic templates that own the primary page heading and keep metadata ownership clear
- Deterministic checks and a single-root installable ZIP for review before release
- Restrained Atomic Studio branding in the theme browser and login fallback, with each site's custom logo taking priority

## Included

- Classic PHP templates for the front page, pages, posts, archives, search, information pages, and 404 responses
- `theme.json` tokens for color, type, spacing, and layout
- Accessible navigation with a skip link, visible focus, keyboard dismissal, and reduced-motion behavior
- Three native block patterns: editorial hero, split content, and focused call to action
- Responsive, dependency-free CSS and a single small navigation script
- Comments and legacy emoji compatibility assets disabled by default
- Pingbacks and trackbacks disabled
- Atomic Studio login fallback that yields to the configured site logo
- Theme ZIP packaging and lightweight verification scripts
- PHP_CodeSniffer configuration based on the WordPress Coding Standards

## Requirements

- WordPress 6.4 or later
- PHP 8.0 or later
- PHP, Composer, Bash, `zip`, and `unzip` for local development checks

The installed theme has no Composer or Node runtime dependency.

## Quick start

1. Download or clone the repository.
2. Copy the repository directory to `wp-content/themes/atomic-wp-starter`, or run `composer package` and upload `dist/atomic-wp-starter.zip` in WordPress.
3. Activate **Atomic WP Starter**.
4. Assign a primary menu, set a site logo, and create a static front page.
5. Replace the sample front-page content or insert one of the included patterns in the block editor.

## Lean defaults and comments

Comments are off on a fresh installation. Enable them at **Settings > Discussion > Atomic WP Starter** when a project needs native WordPress discussion. The master switch restores the normal per-post controls, moderation settings, comment list, and form. Pingbacks and trackbacks remain disabled because they add legacy behavior without helping the usual marketing-site workflow.

The emoji cleanup removes WordPress compatibility scripts and styles. It does not remove emoji characters from content or prevent browsers and operating systems from displaying them.

## Editing model

WordPress owns page and post content, menus, the custom logo, and uploaded media. The repository owns templates, presentation, patterns, and front-end behavior. Content models or operational behavior that must survive a theme switch belong in a site plugin rather than this theme.

The `Information / Legal` page template provides a consistent treatment for privacy, terms, accessibility, and similar long-form pages.

## Development

```bash
composer install
composer check
composer package
```

`composer check` runs PHP syntax checks, repository checks, and WordPress Coding Standards. `composer package` creates a ZIP with exactly one top-level `atomic-wp-starter` directory.

### Workflow

The repository is deliberately structured for human-led, AI-enabled workflows: clear file ownership, compact source files, deterministic checks, and a reviewable release artifact. Assisted tools can accelerate exploration and repetitive implementation. They do not replace real-world experience, client context, taste, long-term thinking, scalability judgment, code review, accessibility checks, or accountable release decisions.

## SEO and answer readiness

The theme provides a lean technical foundation: server-rendered semantic HTML, template-owned page headings, WordPress-managed titles and sitemaps, responsive media, and accessible navigation. It intentionally does not generate business schema, social cards, or competing metadata.

Configure one dedicated SEO plugin, such as Yoast SEO or Rank Math, to own descriptions, canonical rules, social metadata, and structured data for the finished site. Search visibility still depends on accurate content, site settings, redirects, crawl testing, field performance, and launch verification.

## Accessibility and performance

The theme includes a practical baseline: semantic landmarks, keyboard-friendly navigation, visible focus, sufficient default contrast, reduced-motion handling, responsive layouts, and no front-end framework. These choices reduce common regressions; they do not replace testing with real content, assistive technology, and representative devices.

## Project status

This is a focused 1.0 starter with an intentionally narrow scope. The version signals stability within that documented scope; it is not intended to become a general-purpose theme framework. See [CHANGELOG.md](CHANGELOG.md) for releases and [CONTRIBUTING.md](CONTRIBUTING.md) for contribution guidance.

## License

Atomic WP Starter code and bundled theme artwork are licensed under the [GNU General Public License v2.0 or later](LICENSE). The Atomic Studio name and mark remain Atomic Studio brand identifiers.
