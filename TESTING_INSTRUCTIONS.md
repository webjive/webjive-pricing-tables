# Testing DIVI 5 Module - Quick Instructions

## 🚀 Build the Module

Before testing, you need to build the DIVI 5 module:

```bash
cd "/Users/eric_caldwell/Downloads/Claude Projects/webjive-pricing-tables"
npm install
npm run build
```

**Expected Output:**
- `divi-module/build/module.js` will be created
- Build should complete without errors

## 📦 Deploy to Test Site

### Option 1: Direct Upload (Recommended for Testing)

1. **Create ZIP file:**
   ```bash
   cd "/Users/eric_caldwell/Downloads/Claude Projects"
   zip -r webjive-pricing-tables-divi5.zip webjive-pricing-tables \
     -x "*/node_modules/*" -x "*/.git/*" -x "*.DS_Store"
   ```

2. **Upload to WordPress:**
   - Go to: Plugins → Add New → Upload Plugin
   - Select: `webjive-pricing-tables-divi5.zip`
   - Click: Install Now → Activate

### Option 2: FTP/SFTP Upload

Upload the entire plugin folder to:
```
/wp-content/plugins/webjive-pricing-tables/
```

Make sure `divi-module/build/module.js` exists!

## ✅ Verify Installation

### Step 1: Check Plugin Active

- WordPress Admin → Plugins
- Look for: **WebJIVE Pricing Tables v1.1.0**
- Status: Should show "Active"

### Step 2: Create Test Table

1. Go to: **Pricing Tables → Add New**
2. Name it: "DIVI 5 Test Table"
3. Configure:
   - Columns: 3
   - Show Labels: Yes
   - Add some test features
4. Click: **Publish**

### Step 3: Test in DIVI Visual Builder

1. **Edit a page with DIVI:**
   - Click "Enable Visual Builder"

2. **Add the Module:**
   - Click "+" (Add New Module)
   - Search for: "WebJIVE Pricing Table"
   - Should appear with 📊 icon

3. **Configure Module:**
   - Module settings should open
   - Look for: "Select Pricing Table" dropdown
   - Dropdown should show: "DIVI 5 Test Table"
   - Select your test table

4. **Verify Display:**
   - Table should render immediately
   - Should match your admin configuration
   - Try changing table in dropdown (should update live)

## 🔍 Troubleshooting

### Module Not Showing in Builder

**Check PHP errors:**
```bash
# View WordPress debug log
tail -f /path/to/wp-content/debug.log
```

**Verify DIVI version:**
- Go to: DIVI → Theme Options → Updates
- Must be: DIVI 5.0+

**Check build file exists:**
```bash
ls -la divi-module/build/module.js
```
If missing, run `npm run build` again.

### Dropdown is Empty

**Issue:** No tables appear in dropdown

**Solutions:**
1. Create a pricing table in admin
2. Make sure table is **Published** (not Draft)
3. Refresh the page builder

### REST API Issues

**Test endpoints:**
```bash
# List all tables
curl https://your-site.com/wp-json/webjive-pricing-tables/v1/tables

# Get specific table (ID 1)
curl https://your-site.com/wp-json/webjive-pricing-tables/v1/table/1
```

**Fix permalinks:**
1. Go to: Settings → Permalinks
2. Click: Save Changes (flushes rewrite rules)
3. Test REST endpoint again

### Build Errors

**Missing dependencies:**
```bash
npm install --save-dev @babel/core @babel/preset-env @babel/preset-react babel-loader webpack webpack-cli
npm run build
```

**Clean install:**
```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

## 🎯 What to Test

### Basic Functionality
- [ ] Module appears in builder
- [ ] Dropdown shows tables
- [ ] Selecting table shows preview
- [ ] Preview matches admin settings
- [ ] Save and publish works
- [ ] Table displays on frontend

### Visual Builder Features
- [ ] Drag and drop works
- [ ] Duplicate module works
- [ ] Delete module works
- [ ] Undo/redo works
- [ ] Module settings persist

### Styling
- [ ] Admin colors apply correctly
- [ ] DIVI Design tab works
- [ ] Custom CSS works
- [ ] Module spacing works
- [ ] Animations work (if applied)

### Responsive
- [ ] Desktop view correct
- [ ] Tablet view correct
- [ ] Mobile cards appear < 767px
- [ ] Responsive preview mode works

### Edge Cases
- [ ] No table selected shows placeholder
- [ ] Invalid table ID handled gracefully
- [ ] Multiple modules on same page work
- [ ] Works with other DIVI modules

## 📸 Expected Results

### In Visual Builder

**Before Selecting Table:**
```
┌─────────────────────────┐
│          📊            │
│ WebJIVE Pricing Table  │
│ Select a pricing table │
│  from module settings  │
└─────────────────────────┘
```

**After Selecting Table:**
- Full pricing table renders
- All colors and styling from admin
- Mobile-responsive
- Matches shortcode output exactly

## 🐛 Known Issues

None currently - report any issues you find!

## 📊 Performance Notes

- Module only loads in visual builder
- No performance impact on frontend
- REST API cached by WordPress
- Build file is ~20-30KB minified

## 📝 Test Checklist

Quick checklist for testing:

```
Pre-Build:
[ ] Git branch: feature/divi5-module
[ ] npm install completed
[ ] npm run build completed
[ ] module.js exists in divi-module/build/

Deployment:
[ ] Plugin uploaded to test site
[ ] Plugin activated
[ ] No PHP errors in log

Setup:
[ ] Test table created
[ ] Test table published
[ ] DIVI 5 confirmed active

Visual Builder:
[ ] Builder loads without errors
[ ] Module appears in list
[ ] Module icon shows (📊)
[ ] Module settings open
[ ] Dropdown populated
[ ] Table selected
[ ] Preview renders
[ ] Save works
[ ] Frontend displays

Quality:
[ ] Colors correct
[ ] Mobile responsive
[ ] No console errors
[ ] Performance good
```

## 🎉 Success Criteria

✅ **You're successful if:**
1. Module appears in DIVI visual builder
2. Dropdown shows your pricing tables
3. Selecting a table renders it correctly
4. Frontend matches visual builder preview
5. No errors in browser console
6. No errors in PHP log

## 💬 Feedback

After testing, note:
- What worked well
- Any issues encountered
- Performance observations
- User experience feedback
- Suggested improvements

---

**Branch:** feature/divi5-module  
**Version:** 1.1.0  
**Build Status:** Ready for testing
