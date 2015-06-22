<?php

namespace MyVendor\MySirenApi\Resource\App;

use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\RepositoryModule\Annotation\Refresh;
use BEAR\Resource\ResourceObject;
use Ray\AuraSqlModule\AuraSqlInject;

/**
 * @Cacheable
 */
class Comment extends ResourceObject
{
    use AuraSqlInject;

    public function onGet($post_id)
    {
        $sql  = 'SELECT * FROM comment WHERE post_id = :post_id';
        $bind = ['post_id' => $post_id];
        $this->body = $this->pdo->fetchAll($sql, $bind);

        return $this;
    }

    /**
     * @Refresh(uri="app://self/post?id={post_id}")
     */
    public function onPost($post_id, $body)
    {
        $sql = 'INSERT INTO comment (post_id, body) VALUES(:post_id, :body)';
        $statement = $this->pdo->prepare($sql);
        $bind = [
            'post_id' => $post_id,
            'body' => $body
        ];
        $statement->execute($bind);
        $id = $this->pdo->lastInsertId();

        $this->code = 201;
        $this->headers['Location'] = "/comment?id={$id}";

        return $this;
    }
}
