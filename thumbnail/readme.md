Consider:
- Making statSync asynchronous
- Ensuring that uniqueFilename does not lead to race conditions
- Adding a garbage collector to delete old thumbnails
- Handling duplicate urls in the same request