SELECT a.content, concat(u.firstname, ' ', u.lastname)
FROM articles a
LEFT JOIN users u ON a.id_user = users.id
WHERE a.id = 10;