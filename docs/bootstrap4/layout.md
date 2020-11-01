# Container

Bootstrap used the container system for defined the size of
body or HTML tag if the container is applied.

In Bootstrap4, the basics container is :
- .container
- .container-sm
- .container-md
- .container-lg
- .container-xl
- .container-fluid

In Bootstrap4Extension, used the container tag :
```
{% container %}
{% endcontainer %}
```

## Type
The container tag authorized a type attribute for defined container.
If the type is not defined, the **.container** class is used, but
type is a value, the **.container-type** class is used.

## Class
The container tag authorized a class attribute for defined other class.

## Limitation
The container tag not authorized other attribute than type & class.
