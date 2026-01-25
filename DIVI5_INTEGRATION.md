# DIVI 5 Module - Quick Start Guide

## 🚀 Getting Started

### Prerequisites
- WordPress 5.0+
- PHP 7.0+
- DIVI 5 theme or plugin installed
- Node.js 16+ and npm (for building)

### Installation Steps

1. **Install Plugin**
   - Upload and activate WebJIVE Pricing Tables v1.1.0+

2. **Build DIVI Module** (if modifying)
   ```bash
   cd wp-content/plugins/webjive-pricing-tables
   npm install
   npm run build
   ```

3. **Verify Integration**
   - Open DIVI Visual Builder
   - Look for "WebJIVE Pricing Table" module
   - Icon: 📊

## 📊 Using the Module

### In Visual Builder

1. **Add Module**
   - Click "+" to add new module
   - Search for "WebJIVE Pricing Table"
   - Or find in "Pricing" category

2. **Configure Module**
   - Module Settings → "Select Pricing Table" dropdown
   - Choose from your published pricing tables
   - Live preview updates automatically

3. **Style Module**
   - Use DIVI's advanced CSS features
   - Target: `.webjive-pricing-table-wrapper`
   - All your color/style settings from admin still apply

### Creating Tables

Before using the module, create tables in:
**WordPress Admin → Pricing Tables → Add New**

The dropdown will automatically populate with all published tables.

## 🔧 Development

### Build Commands

**Production Build:**
```bash
npm run build
```
- Minified output
- Production optimizations
- Output: `divi-module/build/module.js`

**Development Build:**
```bash
npm run dev
```
- Watch mode
- Automatic rebuild on changes
- Source maps included

### Module Structure

```
divi-module/
├── index.js           # Main module component
├── module.json        # DIVI metadata
└── build/
    └── module.js      # Compiled output (git ignored)
```

### Module Architecture

**React Component:**
```javascript
render: ({ attrs }) => {
  const { tableId } = attrs;
  // Renders ModuleContainer with table
}
```

**Dynamic Content:**
- Fetches via REST API
- Endpoint: `/wp-json/webjive-pricing-tables/v1/table/{id}`
- Returns HTML for live preview

**Attributes:**
- `tableId` (select) - Dynamically populated dropdown

## 🛠️ Technical Details

### REST API Endpoints

**Get Single Table:**
```
GET /wp-json/webjive-pricing-tables/v1/table/{id}
Response: { id, title, columns, html }
```

**Get All Tables:**
```
GET /wp-json/webjive-pricing-tables/v1/tables
Response: [{ value: id, label: title }, ...]
```

### PHP Integration

**Class:** `WebJIVE_Pricing_Tables_DIVI5`  
**File:** `includes/divi5-integration.php`

**Hooks:**
- `divi_extensions_init` - Register module
- `rest_api_init` - Register REST routes
- `wp_enqueue_scripts` - Load module assets
- `divi_module_options_dynamic` - Provide dropdown options

### Asset Loading

**Conditional Loading:**
- Only loads in visual builder (`et_fb_is_enabled()`)
- Checks for `ET_BUILDER_VERSION` constant
- Includes React and ReactDOM externals

**Dependencies:**
```javascript
externals: {
  'react': 'React',
  'react-dom': 'ReactDOM',
  '@divi/module': 'DiviModule'
}
```

## 🎨 Styling in DIVI

### CSS Targeting

**Main Wrapper:**
```css
.webjive-pricing-table-wrapper {
  /* Your custom styles */
}
```

**Advanced Selectors:**
```css
/* Header row */
.webjive-pricing-table-wrapper .pricing-table-header {
  /* Header styles */
}

/* Feature rows */
.webjive-pricing-table-wrapper .feature-label {
  /* Label column */
}

/* Mobile cards */
.webjive-pricing-table-wrapper .tier-card {
  /* Mobile card styles */
}
```

### Using DIVI Design Tab

1. **Background** - Module background color/image
2. **Border** - Module borders and rounded corners
3. **Box Shadow** - Drop shadows
4. **Spacing** - Padding and margin
5. **Animation** - Entrance animations

All table colors from admin (header, rows, etc.) are preserved!

## 🐛 Troubleshooting

### Module Not Appearing

**Check:**
1. DIVI 5 is installed and active
2. Plugin version is 1.1.0+
3. `ET_BUILDER_VERSION` constant exists
4. No PHP errors in debug log

**Test:**
```php
// In wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

### Build Errors

**Issue:** npm install fails  
**Fix:**
```bash
rm -rf node_modules package-lock.json
npm install
```

**Issue:** Webpack errors  
**Fix:**
```bash
npm install --save-dev @babel/core @babel/preset-env @babel/preset-react babel-loader
npm run build
```

### Module Shows Placeholder

**Cause:** No table selected or table doesn't exist

**Solution:**
1. Create a pricing table in admin
2. Publish the table
3. Select it from the module dropdown
4. Placeholder should disappear

### REST API Not Working

**Check:**
1. Permalink structure is set (not "Plain")
2. Go to Settings → Permalinks → Save (flush rewrite rules)
3. Test endpoint directly in browser:
   ```
   https://yoursite.com/wp-json/webjive-pricing-tables/v1/tables
   ```

### Table Not Rendering

**Possible Issues:**
- Table ID is invalid
- Table is in draft status (must be published)
- JavaScript error in console

**Debug:**
```javascript
// In browser console
fetch('/wp-json/webjive-pricing-tables/v1/table/1')
  .then(r => r.json())
  .then(console.log);
```

## 🔄 Updating the Module

### After Code Changes

1. **Rebuild Module:**
   ```bash
   npm run build
   ```

2. **Clear Caches:**
   - Browser cache (Ctrl+Shift+R / Cmd+Shift+R)
   - WordPress cache (if using caching plugin)
   - DIVI cache (DIVI → Theme Options → Builder → Clear Cache)

3. **Test Changes:**
   - Open Visual Builder
   - Add/edit WebJIVE Pricing Table module
   - Verify changes appear

### Version Bumping

When releasing updates:

1. Update version in:
   - `webjive-pricing-tables.php` (header and constant)
   - `package.json`

2. Update `CHANGELOG.md`

3. Rebuild module:
   ```bash
   npm run build
   ```

4. Commit all changes including `CHANGELOG.md`

## 📚 Advanced Customization

### Custom Module Attributes

Edit `divi-module/module.json`:

```json
{
  "attributes": {
    "tableId": { ... },
    "customOption": {
      "type": "text",
      "label": "Custom Setting",
      "default": "value"
    }
  }
}
```

Then use in `divi-module/index.js`:

```javascript
render: ({ attrs }) => {
  const { tableId, customOption } = attrs;
  // Use customOption
}
```

### Custom Styling Integration

Pass custom CSS classes:

```javascript
return (
  <ModuleContainer className="my-custom-class">
    {/* content */}
  </ModuleContainer>
);
```

### Live Preview Enhancements

Improve dynamic content loading:

```javascript
dynamicContent: ({ attrs }) => {
  // Custom fetch logic
  // Return promise for loading states
}
```

## 🎯 Best Practices

### For Users

1. **Create tables first** before adding modules
2. **Publish tables** (drafts won't show)
3. **Use descriptive names** for easy selection
4. **Test mobile view** in responsive preview
5. **Clear cache** after plugin updates

### For Developers

1. **Run dev build** during development
2. **Production build** before committing
3. **Test in visual builder** thoroughly
4. **Check browser console** for errors
5. **Verify REST endpoints** work
6. **Follow WordPress/DIVI standards**

## 📖 Resources

- [DIVI 5 Documentation](https://www.elegantthemes.com/documentation/)
- [WordPress REST API](https://developer.wordpress.org/rest-api/)
- [React Documentation](https://react.dev/)
- [Webpack Documentation](https://webpack.js.org/)

## ✅ Checklist for Testing

- [ ] Module appears in visual builder
- [ ] Dropdown shows all published tables
- [ ] Placeholder appears when no table selected
- [ ] Table renders when selected
- [ ] Live preview updates correctly
- [ ] Mobile responsive works
- [ ] Colors from admin apply correctly
- [ ] No console errors
- [ ] REST endpoints return data
- [ ] Save and publish works

---

**Version:** 1.1.0  
**Last Updated:** 2025-01-25  
**DIVI Version:** 5.0+
