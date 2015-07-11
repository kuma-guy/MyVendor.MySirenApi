# MyVendor.MySirenApi
Demo API application using Siren with BEAR.Sunday

Siren version of [https://github.com/bearsunday/MyVendor.MyApi]


```
php bootstrap/api.php get '/post?id=1'
```

```
{
    "class": [
        "post"
    ],
    "properties": {
        "id": "1",
        "title": "Test title",
        "body": "Test body"
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
kumagai-no-MacBook-Air:MyVendor.MySirenApi kumagaishingo$ 
kumagai-no-MacBook-Air:MyVendor.MySirenApi kumagaishingo$ 
kumagai-no-MacBook-Air:MyVendor.MySirenApi kumagaishingo$ 
kumagai-no-MacBook-Air:MyVendor.MySirenApi kumagaishingo$ php bootstrap/api.php get '/post?id=1'
200 OK
content-type: application/vnd.siren+json
ETag: 3003023539
Last-Modified: Sat, 11 Jul 2015 05:26:08 GMT

{
    "class": [
        "post"
    ],
    "properties": {
        "id": "1",
        "title": "Test title",
        "body": "Test body"
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
