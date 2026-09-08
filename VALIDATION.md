# Validation Rules Documentation

## Todo Validation

### Title Field
- **Required**: Yes
- **Min Length**: 3 characters
- **Max Length**: 100 characters
- **Error Messages**:
  - "Title is required" - jika title kosong
  - "Title must be at least 3 characters" - jika kurang dari 3 karakter
  - "Title must not exceed 100 characters" - jika lebih dari 100 karakter

### Description Field
- **Required**: Yes
- **Max Length**: 500 characters
- **Error Messages**:
  - "Description is required" - jika description kosong
  - "Description must not exceed 500 characters" - jika lebih dari 500 karakter

## Update Operations
Saat melakukan update, validasi bersifat opsional untuk field yang tidak di-update:
- Jika hanya mengupdate field `completed`, validasi untuk `title` dan `description` tidak dijalankan
- Jika mengupdate `title` atau `description`, validasi penuh akan dilakukan

## Validation Response
Ketika validasi gagal, API akan mengembalikan response:
```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "title": "Title must be at least 3 characters",
    "description": "Description is required"
  }
}
```

## Examples

### Valid Request
```json
{
  "title": "Buy groceries",
  "description": "Buy milk, eggs, and bread from the supermarket"
}
```

### Invalid Request
```json
{
  "title": "AB",
  "description": ""
}
```

Response:
```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "title": "Title must be at least 3 characters",
    "description": "Description is required"
  }
}
```
