# Breadcrumb

Bootstrap used the breadcrumb system for defined an link
collection for indicate page position & go back. 

In Bootstrap4Extension, used the breadcrumb tag :
```
{% breadcrumb %}
{% endbreadcrumb %}
```

In Bootstrap4Extension, used the breadcrumb function :
```
{{ breadcrumb('text') }}
```
for add element in breadcrumb tag.
Multi used function for add multi elements in breadcrumb.

## Class
The breadcrumb tag authorized a class attribute for defined other class.
The other class is defined in the <nav> HTML tag only.

## Limitation
The breadcrumb tag not authorized other attribute than class.

## Breadcrumb function
The function required three no-name parameters :
* Text (required)
* Link (required, but empty is authorized)
* If the active link (optional, default false)
