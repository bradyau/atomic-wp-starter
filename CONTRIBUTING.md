# Contributing

Small, focused contributions are welcome.

## Before opening a pull request

1. Open an issue for changes that materially expand the theme's scope.
2. Keep front-end dependencies out unless the behavior cannot be expressed clearly with WordPress, CSS, or a small amount of native JavaScript.
3. Preserve keyboard, reduced-motion, responsive, and no-JavaScript behavior.
4. Run `composer check` and `composer package`.
5. Review the generated ZIP contents before requesting review.

## Manual QA checklist

Automated checks do not replace a browser review. For changes to templates, styles, or navigation, test on a local or staging WordPress installation with representative content.

- **Keyboard:** Use Tab and Shift+Tab to reach the skip link, navigation, search, and page controls. Confirm focus stays visible, the skip link reaches the main content, and Escape dismisses the mobile menu and returns focus to its toggle.
- **Responsive layout:** Review narrow mobile and desktop widths, then zoom to 200%. Check for clipped text, overlapping controls, unintended horizontal scrolling, and long menu labels.
- **Reduced motion:** Enable the operating system's reduced-motion setting and verify that navigation remains usable without unnecessary animation.
- **Without JavaScript:** Disable JavaScript and reload. Confirm primary navigation, search, and content remain available.
- **Templates and content:** Check the front page, a standard page, the Information / Legal template, a single post, an archive, search results, an empty search, and a missing URL. Include long headings and a page with no featured image.
- **Site settings:** Check navigation with and without an assigned menu, and branding with and without a custom logo. If discussion behavior changes, check both the theme's comments switch and the individual post's discussion setting.

Record the browser/device, pages checked, result, and any known limitations in the pull request. Mark checks that are not relevant as such rather than reporting them as passed.

## Pull requests

- Explain the user-facing reason for the change.
- Keep unrelated formatting or refactoring out of the diff.
- Include manual test notes for desktop, mobile, keyboard, and reduced motion when relevant.
- Do not include site content, credentials, database exports, uploads, licensed assets, or machine-specific paths.

By contributing, you agree that your contribution will be licensed under GPL-2.0-or-later.
