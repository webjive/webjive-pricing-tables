# WebJIVE Pricing Tables - Admin Interface

## 🎯 Overview

This plugin provides a **complete admin interface** for creating and managing unlimited pricing tables. Each table gets its own shortcode that can be embedded anywhere.

## ✨ Features

- **Admin Menu** - "Pricing Tables" in left sidebar
- **Unlimited Tables** - Create as many tables as you need
- **Easy Management** - List all tables, edit, delete
- **Simple Shortcode** - `[webjive table="1"]`
- **Visual Editor** - WYSIWYG for column headers
- **Color Pickers** - Visual color selection
- **Mobile Responsive** - Automatic card layout
- **Copy Shortcode** - Click to copy from admin

## 📦 Installation

1. Upload `webjive-pricing-tables.zip` to WordPress
2. Activate the plugin
3. Look for **"Pricing Tables"** in the left admin menu

## 🚀 Quick Start

### Step 1: Create a New Table

1. Click **Pricing Tables** in the admin menu
2. Click **Add New Table**
3. Give it a name (e.g., "Hosting Pricing")

### Step 2: Configure the Table

**Table Settings:**
- Number of Columns: 2, 3, or 4
- Show Feature Labels: Yes/No

**Column Headers:**
- Use the visual editor for each column
- Add pricing, descriptions, HTML formatting
- Example: `<strong>Business</strong><br>$99/month`

**Features:**
- One feature per line
- Format: `Feature Name | Col1 Value | Col2 Value | Col3 Value`
- Example:
  ```
  Bandwidth | Unmetered | Unmetered | Unmetered
  Email | Unlimited | Unlimited | Unlimited
  SSL | ✅ Yes | ✅ Yes | ✅ Yes
  ```

**Styling Options:**
- Header Background Color
- Header Text Color
- Alternate Row Colors
- Even Row Background
- Feature Label Background

### Step 3: Copy the Shortcode

1. Look at the **Shortcode** box (top right)
2. Click the shortcode to copy it
3. Paste it into any page or post

**Example:** `[webjive table="1"]`

## 📋 Admin Interface

### List View

Shows all your pricing tables with:
- Table name
- Shortcode (for easy copying)
- Number of columns
- Date created

### Edit Screen

**Sections:**
1. **Shortcode Box** (sidebar) - Copy shortcode
2. **Table Settings** - Columns, labels
3. **Column Headers** - Visual editor for each
4. **Features** - Textarea with pipe format
5. **Styling Options** - Color pickers

## 💡 Usage Examples

### Example 1: 3-Column Hosting Table

**Table Name:** "Hosting Plans"

**Settings:**
- Columns: 3
- Show Labels: Yes

**Column Headers:**

Column 1:
```html
<strong>Small Business</strong><br>
$35 - No content updates<br>
$75 - Unlimited updates
```

Column 2:
```html
<strong>Professional</strong><br>
$575/month
```

Column 3:
```html
<strong>Enterprise</strong><br>
Contact for Quote
```

**Features:**
```
Bandwidth | Unmetered | Unmetered | Unmetered
Email Accounts | Unlimited | Unlimited | Unlimited
Free SSL | ✅ Yes | ✅ Yes | ✅ Yes
Daily Backups | ✅ Yes | ✅ Yes | ✅ Yes
99.9% Uptime | ✅ Yes | ✅ Yes | ✅ Yes
Support | ✅ Yes | ✅ Priority | ✅ Direct Line
Free Migration | ✅ Yes | ✅ Yes | ✅ Yes
CDN | ❌ No | ✅ Yes | ✅ Yes
Dedicated IP | ❌ No | ❌ Add-on | ✅ Yes
WP Updates | ✅ Yes | ✅ Yes | ✅ Yes
Performance | Standard | Enhanced | Maximum
```

**Shortcode:** `[webjive table="1"]`

### Example 2: 2-Column Comparison

**Table Name:** "Basic vs Pro"

**Settings:**
- Columns: 2
- Show Labels: Yes

**Features:**
```
Users | 1 User | Unlimited
Storage | 10 GB | 100 GB
Projects | 5 | Unlimited
Support | Email | Priority Phone
```

**Shortcode:** `[webjive table="2"]`

## 🎨 Styling Tips

### Color Schemes

**WebJIVE Orange:**
- Header BG: `#EA6B2D`
- Header Text: `#FFFFFF`
- Even Row: `#F5F5F5`

**Professional Blue:**
- Header BG: `#2563EB`
- Header Text: `#FFFFFF`
- Even Row: `#EFF6FF`

**Corporate Green:**
- Header BG: `#059669`
- Header Text: `#FFFFFF`
- Even Row: `#ECFDF5`

### Using Emojis

```
Storage | ✅ Unlimited | ✅ Unlimited
Support | ⭐ Standard | 💎 Premium
Speed | 🚀 Fast | 🚀 Ultra Fast
```

### HTML Formatting

Column headers support full HTML:
```html
<strong style="font-size: 20px;">Premium</strong><br>
<span style="font-size: 32px; color: #EA6B2D;">$149</span><br>
<small style="color: #666;">per month</small>
```

## 📱 Mobile Responsive

Tables automatically convert to mobile-friendly cards on screens < 767px:
- Each pricing tier becomes a separate card
- Features shown in 2-column layout
- Easy vertical scrolling
- No configuration needed

## 🔄 Managing Tables

### Edit a Table
1. Go to **Pricing Tables** menu
2. Click table name or **Edit**
3. Make changes
4. Click **Update**

### Delete a Table
1. Go to **Pricing Tables** menu
2. Hover over table name
3. Click **Trash**

### Duplicate a Table
1. Edit the table you want to duplicate
2. Select all content (Ctrl+A / Cmd+A)
3. Copy it
4. Create a new table
5. Paste the content

## 🔧 Using in DIVI

### Method 1: Text Module
1. Add **Text Module**
2. Switch to **Text** tab (not Visual)
3. Paste: `[webjive table="1"]`
4. Save

### Method 2: Code Module
1. Add **Code Module**
2. Paste: `[webjive table="1"]`
3. Save

## 🆘 Troubleshooting

**"Pricing Tables" not in admin menu?**
- Make sure plugin is activated
- Refresh the admin page
- Check that you have proper user permissions

**Shortcode displays as text?**
- Make sure you're in Text mode (not Visual)
- Check that shortcode syntax is correct: `[webjive table="1"]`
- Verify the table ID exists

**Styling not showing?**
- Clear all caches (browser, WordPress, DIVI)
- Check for theme CSS conflicts
- Make sure table is published (not draft)

**Colors not working?**
- Use hex format: `#EA6B2D` not `EA6B2D`
- Click the color picker to select visually
- Save the table after making changes

**Mobile cards not appearing?**
- Test on actual mobile device
- Resize browser window < 767px
- Check browser console for JavaScript errors

## 📊 Best Practices

### Table Organization

**Name your tables clearly:**
- ✅ "Hosting Plans - Main Site"
- ✅ "Software Pricing 2025"
- ❌ "Table 1"
- ❌ "Test"

### Feature Formatting

**Keep features consistent:**
```
✅ GOOD:
Feature Name | Value 1 | Value 2 | Value 3

❌ BAD:
Feature Name|Value 1|  Value2  |Value 3
```

### Content Tips

1. **Keep headers concise** - 2-3 lines max
2. **Use consistent formatting** - ✅/❌ for yes/no
3. **Order features by importance** - Most important first
4. **Use descriptive feature names** - Clear and specific
5. **Test on mobile** - Check how cards look

## 🔐 Security

- All data is sanitized and validated
- Uses WordPress nonces for security
- Follows WordPress coding standards
- Safe for multi-user environments

## 🎓 Support

If you need help:
1. Check this README first
2. Review the examples above
3. Test with a simple 2-column table first
4. Clear all caches before troubleshooting

---

**Plugin:** WebJIVE Pricing Tables  
**Version:** 1.0.0  
**Requires:** WordPress 5.0+  
**PHP Version:** 7.0+

**Created by:** WebJIVE  
**Website:** https://www.web-jive.com
