# Changelog

All notable changes to WebJIVE Pricing Tables will be documented in this file.

## [1.2.0] - 2025-01-25

### Version Update
- Bumped version to 1.2.0 to differentiate from legacy versions
- No functional changes from 1.0.0
- Clean release for production deployment

## [1.0.0] - 2026-01-25

### Added
- Initial release
- Custom post type for pricing tables
- Admin interface with left sidebar menu
- Simple shortcode system: `[webjive table="ID"]`
- Support for 2, 3, or 4 columns
- WYSIWYG editors for column headers (H1-H6 selector)
- WYSIWYG editor for feature column header
- Simple pipe-delimited feature entry format
- Color pickers for all styling options:
  - Header background color
  - Header text color
  - Even row background color
  - Feature label background color
- Toggle for alternate row colors (zebra striping)
- Toggle for showing/hiding feature label column
- Header vertical alignment setting (top/middle/bottom)
- Mobile responsive design (automatic card layout < 767px)
- 2-column feature layout on mobile
- Click-to-copy shortcode in admin
- Auto-show/hide column editors based on column count
- Auto-show/hide feature header editor based on checkbox

### Technical Features
- WordPress security (nonces, sanitization)
- Proper meta data storage
- Custom admin columns in list view
- Color picker integration (wp-color-picker)
- TinyMCE editor integration
- Responsive JavaScript for mobile cards
- CSS with no default margins (DIVI-friendly)
- Gradient header backgrounds
- Custom per-table styling via inline CSS
