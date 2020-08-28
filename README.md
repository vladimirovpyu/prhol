
Здесь выполнено тестовое задание с применением паттерна "Состояние": 

Написать класс/объект Apple с хранением яблок в БД MySql следуя ООП парадигме.

Функции
- упасть
- съесть ($percent - процент откушенной части)
- удалить (когда полностью съедено)

Переменные
- цвет (устанавливается при создании объекта случайным)
- дата появления (устанавливается при создании объекта случайным unixTmeStamp)
- дата падения (устанавливается при падении объекта с дерева)
- статус (на дереве / упало)
- сколько съели (%)
- другие необходимые переменные, для определения состояния.

Состояния
- висит на дереве
- упало/лежит на земле
- гнилое яблоко

Условия
Пока висит на дереве - испортиться не может.
Когда висит на дереве - съесть не получится.
После лежания 5 часов - портится.
Когда испорчено - съесть не получится.
Когда съедено - удаляется из массива яблок.

<b>Installation</b>

Clone Repository
```
git clone git@github.com:vladimirovpyu/prhol.git yii2-app-advanced
cd yii2-app-advanced/vagrant/config
```
Vargant 
```
cp vagrant-local.example.yml vagrant-local.yml
```
Place your GitHub personal API token to vagrant-local.yml
```
cd yii2-app-advanced
vagrant plugin install vagrant-hostmanager
vagrant up
```

frontend: http://y2aa-frontend.test
backend: http://y2aa-backend.test

Create database in Vagrant VM and add db configuration to /common/config/main-local.php

Make migrations
```
php yii migrate
```

Create User

Open http://y2aa-frontend.test

Make user (ex: admin/admin123)

<b>Using</b>

Open http://y2aa-backend.test

Login by user

Open http://y2aa-backend.test/apple/index 

Screen:
http://y2aa-backend.test/screen/apple.png
Or github: 
https://github.com/vladimirovpyu/prhol/blob/master/backend/web/screen/apple.png