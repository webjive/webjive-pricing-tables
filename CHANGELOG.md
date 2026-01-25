# Changelog

All notable changes to WebJIVE Pricing Tables will be documented in this file.

## [1.1.0] - 2025-01-25

### Added - DIVI 5 Visual Builder Integration
- **Native DIVI 5 Module** - "WebJIVE Pricing Table" module in visual builder
- **Visual Builder Support** - Drag and drop pricing tables in DIVI 5
- **Real-time Preview** - See tables update live in visual builder
- **Table Dropdown** - Select from all published pricing tables
- **REST API Integration** - `/wp-json/webjive-pricing-tables/v1/` endpoints
- **Build System** - Webpack + Babel for module compilation
- **Module Metadata** - Full DIVI 5 JSON configuration
- **Dynamic Options** - Pricing tables populate automatically
- **Builder Placeholder** - Visual placeholder when no table selected
- **CSS Integration** - Advanced DIVI CSS targeting support

### Technical Details
- REST API endpoint: `/wp-json/webjive-pricing-tables/v1/table/{id}`
- REST API endpoint: `/wp-json/webjive-pricing-tables/v1/tables`
- Module slug: `webjive_pricing_table`
- React-based module with ModuleContainer
- Webpack build to `divi-module/build/module.js`
- Auto-detection of DIVI 5 via `ET_BUILDER_VERSION`

### Development
- `npm run build` - Production build
- `npm run dev` - Development build with watch mode
- Babel transpilation for React JSX
- External React/ReactDOM dependencies

### Files Added
- `divi-module/index.js` - Main module component
- `divi-module/module.json` - Module metadata
- `includes/divi5-integration.php` - PHP integration class
- `package.json` - NPM dependencies and scripts
- `webpack.config.js` - Build configuration
- `.babelrc` - Babel configuration

### Compatibility
- Works alongside v1.0.0 shortcode functionality
- Backward compatible with DIVI 4 (shortcode still works)
- No breaking changes to existing installations

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
