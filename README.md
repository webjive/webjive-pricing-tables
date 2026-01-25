# WebJIVE Pricing Tables - WordPress Plugin

## 🎯 Overview

Create and manage **unlimited responsive pricing tables** with a powerful admin interface. Each table gets its own shortcode for easy embedding anywhere on your site.

## ✨ Key Features

### 🎨 Advanced Editing
- **WYSIWYG Editor** - Full visual editor with H1-H6 support for column headers
- **Smart Column Management** - Auto-hide/show editors based on column count
- **Feature Column Header** - Customizable WYSIWYG editor for feature label column
- **Vertical Alignment Control** - Top, middle, or bottom alignment for header content
- **Visual Color Pickers** - WordPress integrated color selection
- **Click-to-Copy Shortcode** - Instant clipboard copy with visual feedback

### 📊 Table Management
- **Admin Menu** - Dedicated "Pricing Tables" menu in WordPress
- **Unlimited Tables** - Create as many pricing tables as you need
- **2-4 Column Support** - Flexible column layouts
- **Easy Management** - List view with shortcode display
- **Custom Post Type** - Native WordPress integration

### 🎨 Styling Options
- **Header Gradient Backgrounds** - Automatic gradient generation from single color
- **Customizable Colors** - Header background, header text, row colors, feature labels
- **Zebra Striping** - Optional alternating row colors
- **Feature Label Styling** - Independent background color for feature labels
- **Responsive Design** - Automatic mobile card layout

### 📱 Mobile Responsive
- **Automatic Detection** - Converts to cards on screens < 767px
- **Tier-Based Cards** - Each pricing tier becomes a separate card
- **Clean Layout** - Feature label + value in 2-column format
- **No Configuration Needed** - Works automatically

## 📦 Installation

1. Download the plugin ZIP file
2. Go to WordPress Admin → Plugins → Add New
3. Click "Upload Plugin"
4. Select the ZIP file and click "Install Now"
5. Click "Activate Plugin"
6. Look for **"Pricing Tables"** in the left admin menu

## 🚀 Quick Start Guide

### Step 1: Create Your First Table

1. Click **Pricing Tables** in the admin menu
2. Click **Add New Table**
3. Enter a descriptive name (e.g., "Hosting Plans 2025")

### Step 2: Configure Table Settings

**Number of Columns:**
- Choose 2, 3, or 4 columns
- Editors automatically show/hide based on selection

**Show Feature Labels:**
- ✅ On: First column shows feature names
- ❌ Off: Only pricing tier columns display

**Feature Column Header** (when labels enabled):
- Use WYSIWYG editor to format header
- Select H1-H6 or paragraph text
- Default: "Features"

**Header Vertical Alignment:**
- **Top** - Content aligns to top of header cell
- **Middle** - Content centers vertically (default)
- **Bottom** - Content aligns to bottom of header cell

### Step 3: Create Column Headers with WYSIWYG

Each column has a full WYSIWYG editor with heading selector:

**Paragraph Mode:**
```
Business Plan
$99/month
```

**H2 Heading Mode:**
```html
<h2>Business Plan</h2>
$99/month
```

**H3 Heading Mode:**
```html
<h3>Professional</h3>
$149/month
Billed annually
```

**Pro Tip:** Use heading levels (H2-H4) for better SEO and accessibility!

### Step 4: Add Features

Enter features one per line using pipe delimiter:

```
Feature Name | Column 1 Value | Column 2 Value | Column 3 Value
```

**Example:**
```
Bandwidth | Unmetered | Unmetered | Unmetered
Email Accounts | 10 | 50 | Unlimited
Free SSL | ✅ Yes | ✅ Yes | ✅ Yes
Daily Backups | ❌ No | ✅ Yes | ✅ Yes
Priority Support | ❌ No | ❌ No | ✅ Yes
```

### Step 5: Customize Colors

**Header Styling:**
- **Background Color** - Base color for gradient header
- **Text Color** - Header text color
- Gradient automatically generated from background color

**Row Styling:**
- **Alternate Rows** - Enable/disable zebra striping
- **Even Row Background** - Color for even-numbered rows
- **Feature Label Background** - Color for feature name column

### Step 6: Copy and Use Shortcode

1. Find the **Shortcode** box in the right sidebar
2. Click the shortcode text to automatically copy
3. Visual feedback (green highlight) confirms copy
4. Paste `[webjive table="123"]` into any page or post

## 🎨 Advanced Styling Examples

### Corporate Professional
```
Header Background: #2563EB (Blue)
Header Text: #FFFFFF (White)
Even Row: #EFF6FF (Light Blue)
Feature Label: #DBEAFE (Lighter Blue)
```

### Modern Orange
```
Header Background: #EA6B2D (Orange)
Header Text: #FFFFFF (White)
Even Row: #FFF8F5 (Light Peach)
Feature Label: #F5F5F5 (Light Gray)
```

### Clean Green
```
Header Background: #059669 (Green)
Header Text: #FFFFFF (White)
Even Row: #ECFDF5 (Mint)
Feature Label: #D1FAE5 (Light Mint)
```

## 💡 Real-World Examples

### Example 1: Hosting Plans with H3 Headers

**Settings:**
- Columns: 3
- Show Labels: Yes
- Feature Header: `<h4>Features</h4>`
- Header Alignment: Middle

**Column Headers (using H3):**

Column 1:
```html
<h3>Starter</h3>
$35/month
No content updates
```

Column 2:
```html
<h3>Business</h3>
$75/month
Unlimited updates
```

Column 3:
```html
<h3>Enterprise</h3>
$149/month
Priority support
```

**Features:**
```
Disk Space | 10 GB SSD | 50 GB SSD | 200 GB SSD
Bandwidth | Unmetered | Unmetered | Unmetered
Email Accounts | 10 | 50 | Unlimited
Websites | 1 | 5 | Unlimited
Free SSL | ✅ Yes | ✅ Yes | ✅ Yes
Daily Backups | ❌ No | ✅ Yes | ✅ Yes
CDN | ❌ No | ✅ Yes | ✅ Yes
Dedicated IP | ❌ No | ❌ Add $5/mo | ✅ Included
Support | Email | Priority | 24/7 Phone
WP Updates | ✅ Yes | ✅ Yes | ✅ Yes
```

**Result:** Professional hosting table with SEO-friendly H3 headers

### Example 2: SaaS Pricing with Top Alignment

**Settings:**
- Columns: 3
- Show Labels: Yes
- Header Alignment: Top
- Zebra Striping: Enabled

**Column Headers (using H2):**
```html
<h2>Basic</h2>
<strong>$29</strong>/month
Perfect for individuals
```

**Features:**
```
Users | 1 User | 5 Users | Unlimited
Projects | 3 | 10 | Unlimited
Storage | 5 GB | 50 GB | 500 GB
API Access | ❌ No | ✅ Limited | ✅ Full
Support | Email | Priority | Dedicated
```

### Example 3: Service Tiers without Feature Labels

**Settings:**
- Columns: 2
- Show Labels: No (clean comparison)
- Header Alignment: Middle

**Result:** Simple 2-column comparison with no feature labels column

## 🎯 WYSIWYG Editor Tips

### Heading Level Selection

Click the **dropdown in the WYSIWYG toolbar** to select heading level:

- **Paragraph** - Regular text (no heading tags)
- **Heading 1** - `<h1>` - Avoid for SEO (one H1 per page)
- **Heading 2** - `<h2>` - Great for main tier names
- **Heading 3** - `<h3>` - Good for plan names
- **Heading 4** - `<h4>` - Perfect for sub-sections
- **Heading 5** - `<h5>` - Smaller emphasis
- **Heading 6** - `<h6>` - Smallest heading

### Best Practices

1. **Use H2 or H3** for pricing tier names
2. **Use H4** for the feature column header
3. **Keep hierarchy consistent** across all columns
4. **Add line breaks** with Shift+Enter
5. **Avoid H1** (conflicts with page title)

## 📱 Mobile Responsive Behavior

### Desktop View (≥768px)
- Full table layout
- All columns visible
- Hover effects enabled
- Zebra striping (if enabled)

### Mobile View (<767px)
- Table automatically hidden
- Converts to vertical tier cards
- Each tier becomes a separate card
- Card header shows pricing tier
- Features displayed in 2-column layout
- Clean, touch-friendly interface

### Tablet View (768-1024px)
- Table layout maintained
- Font sizes slightly reduced
- Padding optimized for tablet screens

## 🔧 Using in Page Builders

### DIVI Theme

**Method 1: Text Module**
1. Add a **Text Module**
2. Switch to **Text** tab
3. Paste: `[webjive table="1"]`
4. Save

**Method 2: Code Module**
1. Add a **Code Module**
2. Paste: `[webjive table="1"]`
3. Save

**Method 3: Shortcode Module (if available)**
1. Add **Shortcode Module**
2. Enter: `[webjive table="1"]`
3. Save

### Elementor

1. Add **Shortcode Widget**
2. Enter: `[webjive table="1"]`
3. Publish

### Gutenberg

1. Add **Shortcode Block**
2. Enter: `[webjive table="1"]`
3. Publish

### Classic Editor

Simply paste `[webjive table="1"]` directly into the content area.

## 🔄 Management Features

### List View Features
- **Table Name** - Click to edit
- **Shortcode** - Pre-formatted for copying
- **Column Count** - Quick reference
- **Date** - Creation/modification date
- **Bulk Actions** - Delete multiple tables

### Admin Interface Enhancements
- **Auto-Hiding Editors** - Show only active columns
- **Feature Header Toggle** - Show/hide based on labels setting
- **Color Picker Integration** - WordPress native color picker
- **Auto-Copy Shortcode** - Click to copy with feedback
- **Smart Column Management** - JavaScript-powered editor visibility

## 🆘 Troubleshooting

### Shortcode Not Working

**Problem:** Shortcode displays as text  
**Solution:**
- Paste in Text mode (not Visual)
- Verify syntax: `[webjive table="1"]`
- Check table ID exists
- Ensure table is published

### Editors Not Showing/Hiding

**Problem:** Column editors don't hide when changing column count  
**Solution:**
- JavaScript is working - editors hide automatically
- If not working, check browser console for errors
- Clear browser cache
- Disable conflicting plugins

### Colors Not Applying

**Problem:** Custom colors don't show on frontend  
**Solution:**
- Use hex format: `#EA6B2D` not `EA6B2D`
- Click "Update" after color changes
- Clear WordPress cache
- Clear browser cache
- Check theme CSS conflicts

### Mobile Cards Not Appearing

**Problem:** Table doesn't convert on mobile  
**Solution:**
- Test on actual device or resize browser < 767px
- Check browser console for JavaScript errors
- Verify jQuery is loading
- Clear all caches

### WYSIWYG Not Loading

**Problem:** Visual editor doesn't appear  
**Solution:**
- WordPress 5.0+ required
- Check PHP version (7.0+)
- Disable conflicting plugins
- Check browser console for errors

## 📊 Best Practices

### Naming Conventions
✅ **Good:**
- "Hosting Plans - Main Site - 2025"
- "SaaS Pricing - Quarterly Update"
- "Service Tiers - Enterprise"

❌ **Avoid:**
- "Table 1"
- "Test"
- "New Table"

### Feature Formatting
✅ **Consistent spacing:**
```
Feature Name | Value 1 | Value 2 | Value 3
```

❌ **Inconsistent spacing:**
```
Feature Name|Value 1|  Value2  |Value 3
```

### Content Strategy

1. **Use Semantic Headings** - H2-H4 for better SEO
2. **Keep Headers Concise** - 2-3 lines maximum
3. **Consistent Emojis** - ✅/❌ for yes/no features
4. **Order by Importance** - Most critical features first
5. **Mobile-First Testing** - Check card layout early
6. **Clear Value Props** - Make benefits obvious
7. **Call-to-Action** - Add buttons/links in headers if needed

## 🔐 Security & Performance

### Security Features
- WordPress nonces for CSRF protection
- Data sanitization with `wp_kses_post()`
- Permission checks for all operations
- Safe for multi-user environments
- No SQL injection vulnerabilities

### Performance
- Lightweight CSS (< 5KB)
- Minimal JavaScript (< 3KB)
- No external dependencies
- Loads only on pages with shortcode
- Optimized for Core Web Vitals

## 🛠️ Technical Specifications

**Requirements:**
- WordPress: 5.0 or higher
- PHP: 7.0 or higher
- MySQL: 5.6 or higher

**Features:**
- Custom Post Type: `pricing_table`
- Shortcode: `[webjive table="ID"]`
- Assets: Conditionally loaded
- Admin: Custom meta boxes
- Frontend: Responsive CSS + JS

**Browser Support:**
- Chrome (last 2 versions)
- Firefox (last 2 versions)
- Safari (last 2 versions)
- Edge (last 2 versions)

## 📝 Changelog

### Version 1.2.0 (2025-01-25)
**Version Update Release**

**Changes:**
- Version bumped to 1.2.0 to differentiate from legacy versions
- No functional changes from 1.0.0
- Clean production release

### Version 1.0.0 (2025-01-25)
**Initial Release**

**Features:**
- Full WYSIWYG editor for column headers with H1-H6 selector
- Smart column editor management (auto-hide/show)
- Feature column header with WYSIWYG editor
- Header vertical alignment control (top/middle/bottom)
- Visual color pickers (header, rows, labels)
- 2-4 column support
- Zebra striping toggle
- Mobile responsive tier cards
- Click-to-copy shortcode with feedback
- Custom post type integration
- Admin list view with shortcodes

**Admin Interface:**
- Dedicated Pricing Tables menu
- Meta boxes for settings, headers, features, styling
- WordPress color picker integration
- Auto-save functionality

**Frontend:**
- Gradient header backgrounds
- Hover effects on desktop
- Automatic mobile card conversion
- DIVI theme compatibility
- Print-friendly styles

## 🎓 Support & Resources

**Need Help?**
1. Read this README thoroughly
2. Check the examples above
3. Start with a simple 2-column table
4. Test on a staging site first

**Common Questions:**
- How do I change heading levels? - Use the dropdown in the WYSIWYG toolbar
- Can I have different alignments per column? - No, alignment applies to all headers
- How many tables can I create? - Unlimited
- Does it work with my theme? - Yes, works with any WordPress theme

---

## 📄 License

GPL2 - Free to use and modify

---

**Plugin:** WebJIVE Pricing Tables  
**Version:** 1.2.0  
**Author:** WebJIVE  
**Website:** https://www.web-jive.com  
**Repository:** https://github.com/webjive/webjive-pricing-tables

**Created with ❤️ for the WordPress community**
