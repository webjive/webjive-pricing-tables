# Changelog

All notable changes to WebJIVE Pricing Tables will be documented in this file.

## [1.2.0] - 2025-01-25

### Version Update
- Bumped version to 1.2.0 to differentiate from legacy versions
- No functional changes from 1.0.0
- Clean release for production deployment
- Simplified description (removed DIVI 5 module reference for clarity)

## [1.0.0] - 2025-01-25

### Added - Initial Release
- **Custom Post Type** - `pricing_table` for managing tables
- **Admin Interface** - Complete WordPress admin integration
- **Unlimited Tables** - Create as many pricing tables as needed
- **Shortcode Support** - `[webjive table="ID"]` for embedding

### Features - Table Configuration
- **Column Support** - 2, 3, or 4 columns per table
- **WYSIWYG Editors** - Full visual editor for each column header
- **Heading Selector** - H1-H6 dropdown in WYSIWYG toolbar
- **Smart Column Management** - Auto-hide/show editors based on column count
- **Feature Labels** - Optional first column for feature names
- **Feature Header WYSIWYG** - Customizable feature column header
- **Vertical Alignment** - Top, middle, bottom alignment for headers
- **Pipe-Delimited Features** - Simple format: `Name | Col1 | Col2 | Col3`

### Features - Styling
- **Visual Color Pickers** - WordPress integrated color selection
- **Header Gradients** - Automatic gradient from single color
- **Header Colors** - Background and text color customization
- **Zebra Striping** - Optional alternating row colors
- **Row Colors** - Even row background customization
- **Feature Label Colors** - Independent background for labels

### Features - Mobile Responsive
- **Automatic Detection** - Converts at 767px breakpoint
- **Tier Cards** - Each pricing tier becomes separate card
- **Clean Layout** - Feature label + value layout
- **No Configuration** - Works automatically

### Features - Admin Experience
- **Dedicated Menu** - "Pricing Tables" in WordPress sidebar
- **List View** - Shows all tables with shortcodes
- **Meta Boxes** - Organized settings, headers, features, styling
- **Click-to-Copy** - Shortcode with clipboard copy
- **Visual Feedback** - Green highlight on successful copy

### Technical
- **Security** - WordPress nonces, data sanitization
- **Performance** - Lightweight CSS/JS, conditional loading
- **Standards** - WordPress coding standards
- **Browser Support** - Modern browsers (last 2 versions)

### Assets
- `assets/admin.css` - Admin interface styles
- `assets/admin.js` - Color pickers, column management
- `assets/frontend.css` - Responsive table and card styles
- `assets/frontend.js` - Mobile card generation
