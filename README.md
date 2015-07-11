# MyVendor.MySirenApi
Demo API application using Siren with BEAR.Sunday

Siren version of [https://github.com/bearsunday/MyVendor.MyApi]

## Add Post
```
php bootstrap/api.php post 'app://self/post?title=greeting&body=hello'
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