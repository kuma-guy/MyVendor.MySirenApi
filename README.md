# MyVendor.MySirenApi
Demo API application using Siren with BEAR.Sunday

Siren version of [https://github.com/bearsunday/MyVendor.MyApi]

## Add Post

```
php bootstrap/api.php post '/post?title=greeting&body=hello'
```

```
201 Created
Location: /post?id=1
content-type: application/vnd.siren+json

{
    "class": [
        "new-post"
    ],
    "properties": {
        "title": "greeting",
        "body": "hello"
    },
    "links": [
        {
            "rel": [
                "self"
            ],
            "href": "\/post?id=1"
        }
    ]
}
```

## Get Post

```
php bootstrap/api.php get '/post?id=1'
```

```
200 OK
content-type: application/vnd.siren+json
ETag: 1209529988
Last-Modified: Sat, 11 Jul 2015 16:15:21 GMT

{
    "class": [
        "post"
    ],
    "properties": {
        "id": "1",
        "title": "greeting",
        "body": "hello"
    },
    "actions": [
        {
            "name": "add-comment",
            "href": "\/comment?post_id=1",
            "method": "POST",
            "title": "Add Comment",
            "type": "application\/x-www-form-urlencoded",
            "fields": [
                {
                    "name": "post_id",
                    "type": "hidden",
                    "value": "1"
                },
                {
                    "name": "body",
                    "type": "text"
                }
            ]
        }
    ],
    "links": [
        {
            "rel": [
                "self"
            ],
            "href": "\/post?id=1"
        }
    ]
}
```

## Add Comment

```
php bootstrap/api.php post '/comment?post_id=1&body=nice post !'
```

```
201 Created
Location: /comment?post_id=1
content-type: application/vnd.siren+json

{
    "links": [
        {
            "rel": [
                "self"
            ],
            "href": "\/comment?post_id=1"
        }
    ]
}

```

## Get Post With Comments

Now, the comment for the post which we first created will be embedded as entity.
If you request the post, you will get like this.

```
200 OK
content-type: application/vnd.siren+json
ETag: 1492266957
Last-Modified: Sun, 12 Jul 2015 03:56:12 GMT

{
    "class": [
        "post"
    ],
    "properties": {
        "id": "1",
        "title": "greeting",
        "body": "hello"
    },
    "entities": [
        {
            "href": "\/comment?post_id=1",
            "rel": [
                "comment"
            ],
            "class": [
                "comment"
            ],
            "properties": [
                {
                    "id": "1",
                    "post_id": "1",
                    "body": "nice post !"
                }
            ]
        }
    ],
    "actions": [
        {
            "name": "add-comment",
            "href": "\/comment?post_id=1",
            "method": "POST",
            "title": "Add Comment",
            "type": "application\/x-www-form-urlencoded",
            "fields": [
                {
                    "name": "post_id",
                    "type": "hidden",
                    "value": "1"
                },
                {
                    "name": "body",
                    "type": "text"
                }
            ]
        }
    ],
    "links": [
        {
            "rel": [
                "self"
            ],
            "href": "\/post?id=1"
        }
    ]
}
```