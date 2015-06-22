<?php

namespace MyVendor\MySirenApi\Resource\App;

use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\Annotation\Link;
use BEAR\Resource\Exception\ResourceNotFoundException;
use BEAR\Resource\ResourceObject;
use BEAR\SirenModule\Annotation\SirenEmbedLink;
use BEAR\SirenModule\Annotation\SirenEmbedResource;
use Ray\AuraSqlModule\AuraSqlInject;

/**
 * @Cacheable
 */
class Post extends ResourceObject
{
    use AuraSqlInject;

    /**
     * @SirenEmbedResource(rel="comment", src="app://self/comment{?post_id}")
     */
    public function onGet($id)
    {
        $sql  = 'SELECT * FROM post WHERE id = :id';
        $bind = ['id' => $id];
        $post =  $this->pdo->fetchOne($sql, $bind);
        if (! $post) {
            throw new ResourceNotFoundException;
        }
        $this->body += $post;

        $post_id = $id;
        $this['comment']->addQuery(['post_id' => $post_id])->eager->request();

        return $this;
    }

    public function onPost($title, $body)
    {
        $sql = 'INSERT INTO post (title, body) VALUES(:title, :body)';
        $statement = $this->pdo->prepare($sql);
        $bind = [
            'title' => $title,
            'body' => $body
        ];
        $statement->execute($bind);
        $id = $this->pdo->lastInsertId();

        $this->code = 201;
        $this->headers['Location'] = "/post?id={$id}";

        $this['title'] = $title;
        $this['body'] = $body;

        return $this;
    }
}
