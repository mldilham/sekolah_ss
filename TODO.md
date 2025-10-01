# TODO: Fix Operator Siswa Menu Redirect Issue

## Problem
When clicking "Tambah Siswa" or "Edit" buttons in operator siswa menu, it redirects to landing page instead of create/edit pages.

## Root Cause
Operator siswa views were using admin routes and layout instead of operator ones.

## Solution
Update operator siswa views to use correct routes and layout:

### Files Updated
- [x] resources/views/operator/siswa/index.blade.php - Already correct
- [x] resources/views/operator/siswa/create.blade.php - Updated layout and routes
- [x] resources/views/operator/siswa/edit.blade.php - Updated layout and routes
- [x] resources/views/operator/berita/index.blade.php - Updated layout and routes
- [x] resources/views/operator/berita/create.blade.php - Updated routes
- [x] resources/views/operator/berita/edit.blade.php - Updated layout and routes
- [x] resources/views/operator/galeri/index.blade.php - Updated layout and routes
- [x] resources/views/operator/galeri/create.blade.php - Updated layout and routes
- [x] resources/views/operator/galeri/edit.blade.php - Updated layout and routes
- [x] resources/views/operator/ekskul/index.blade.php - Updated layout and routes
- [x] resources/views/operator/ekskul/create.blade.php - Already correct
- [x] resources/views/operator/ekskul/edit.blade.php - Updated layout and routes
- [x] resources/views/operator/profile/index.blade.php - Updated layout and routes
- [x] resources/views/operator/profile/edit.blade.php - Updated layout and routes

### Changes Made
1. Changed @extends('admin.layouts.app') to @extends('operator.layouts.app')
2. Changed route('admin.*') to route('operator.*')

### Testing
- [ ] Test clicking "Tambah Siswa" button in operator siswa index
- [ ] Test clicking "Edit" button for a siswa record
- [ ] Verify forms submit correctly and redirect back to index
- [ ] Verify no more redirects to landing page
