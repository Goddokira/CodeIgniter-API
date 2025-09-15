# Dokumentasi API Backend Flutter

**Nama:** Azriel Ahmad Avalent
**No Absen:** 10  
**Kelas:** XII RPL 1  

---

## A. Registrasi

**Endpoint:** `/registrasi`  
**Method:** `POST`  
**Header:**  
- `Content-Type: application/json`

**Body:**
```
{
  "nama": "string",
  "email": "string, unique",
  "password": "string"
}
```

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": "string"
}
```

**Screenshot Postman:**  
![Registrasi](./ss/registrasi.png)

---

## B. Login

**Endpoint:** `/login`  
**Method:** `POST`  
**Header:**  
- `Content-Type: application/json`

**Body:**
```
{
  "email": "string",
  "password": "string"
}
```

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": {
    "token": "string",
    "user": {
      "id": "integer",
      "email": "string"
    }
  }
}
```

**Screenshot Postman:**  
![Login](./ss/login.png)

---

## C. Produk

### 1. List Produk
**Endpoint:** `/produk`  
**Method:** `GET`  
**Header:**  
- `Content-Type: application/json`

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": [
    {
      "id": "integer",
      "kode_produk": "string",
      "nama_produk": "string",
      "harga": "integer"
    },
    {
      "id": "integer",
      "kode_produk": "string",
      "nama_produk": "string",
      "harga": "integer"
    }
  ]
}
```

**Screenshot Postman:**  
![List Produk](./ss/list_produk.png)

---

### 2. Create Produk
**Endpoint:** `/produk`  
**Method:** `POST`  
**Header:**  
- `Content-Type: application/json`

**Body:**
```
{
  "kode_produk": "string",
  "nama_produk": "string",
  "harga": "integer"
}
```

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": {
    "id": "integer",
    "kode_produk": "string",
    "nama_produk": "string",
    "harga": "integer"
  }
}
```

**Screenshot Postman:**  
![Create Produk](./ss/create_produk.png)

---

### 3. Update Produk
**Endpoint:** `/produk/{id}/update`  
**Method:** `POST`  
**Header:**  
- `Content-Type: application/json`

**Body:**
```
{
  "kode_produk": "string",
  "nama_produk": "string",
  "harga": "integer"
}
```

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": "boolean"
}
```

**Screenshot Postman:**  
![Update Produk](./ss/update_produk.png)

---

### 4. Show Produk
**Endpoint:** `/produk/{id}`  
**Method:** `GET`  
**Header:**  
- `Content-Type: application/json`

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": {
    "id": "integer",
    "kode_produk": "string",
    "nama_produk": "string",
    "harga": "integer"
  }
}
```

**Screenshot Postman:**  
![Show Produk](./ss/show_produk.png)

---

### 5. Delete Produk
**Endpoint:** `/produk/{id}`  
**Method:** `DELETE`  
**Header:**  
- `Content-Type: application/json`

**Response:**
```
{
  "code": "integer",
  "status": "boolean",
  "data": "boolean"
}
```

**Screenshot Postman:**  
![Delete Produk](./ss/delete_produk.png)
