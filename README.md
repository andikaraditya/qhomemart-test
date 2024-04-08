# Qhomemart Test

## POST /rectangle
- Example body
```json
{
    "length": 10,
    "height": 5
}
```
- Response 
```json
{
    "message": "success",
    "data": 50
}
```

## GET /now
- Response 
```json
{
    "message": "success",
    "data": "2024-04-08 19:04:16"
}
```

## GET /name
- Example query params
```json
{
    "name": "john"
}
```
- Response 
```json
{
    "message": "success",
    "data": "Hello john"
}
```

## POST /messages
- Example body
```json
{
    "pesan": "Hello world"
}
```
- Response 
```json
{
    "message": "success",
    "data": "Hello world"
}
```

## GET /messages
- Response 
```json
{
    "message": "success",
    "data": [
        {
            "id": "1",
            "message": "hello world"
        },
        {
            "id": "2",
            "message": "hello again"
        }
    ]
}
```