# lesson_20240710# homework_laravel


localhost:8082/api/posts/create

'text' => 'required|string|min:2|max:255', 

'user_id' => 'required|integer', 

'mark' => 'required|integer'

----------------------------------------------------------------------------

localhost:8082/api/comments/create

'text' => 'required|string|min:2|max:255',

'user_id' => 'required|integer',

'post_id' => 'required|integer'

# Для теста авторизация не требуется
