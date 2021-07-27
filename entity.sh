echo "git checkout main"
echo "git checkout main"
echo "git branch entity"
echo "Entity Categorypost:"
echo "| values: The primary key is created by the maker"
echo "name
string
100
no
slug
string
120
no
parentpost
relation
Categorypost
ManyToOne
yes
yes
categoriespost


" > attribut.val
echo "php bin/console make:entity Categorypost < attribut.val"

