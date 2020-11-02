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


# Row

Bootstrap used the row system for defined the lines of page.
In Bootstrap4Extension, used the row tag :
```
{% row %}
{% endrow %}
```

## Class
The row tag authorized a class attribute for defined other class.

## Limitation
The row tag not authorized other attribute then class.


# Col

Bootstrap used the col system for defined the cols of page.

In Bootstrap4, the basics cols is :
- .col
- .col-sm
- .col-md
- .col-lg
- .col-xl
The cols accept the -{0,12} for defined size of column.

In Bootstrap4Extension, used the col tag :
```
{% col %}
{% endcol %}
```

## Type
The col tag authorized a type attribute for defined col.
If the type is not defined, the **.col** class is used, but
type is a value, the **.col-type** class is used.

## Class
The col tag authorized a class attribute for defined other class.

## Limitation
The col tag not authorized other attribute then type & class.
