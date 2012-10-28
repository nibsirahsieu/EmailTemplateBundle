## Configuration

The **service that loads and renders email is called 'Loader'**. 

Default loader is Twig, you can access it as shown below

```php 
$this->get('sfk_email_template.loader')
    ->load('AcmeDemoBundle::my_template.html.twig')
;
```
>**'sfk_email_template.loader'** is just an alias to the twig, object or any other loader 
>depending on the settings in app/config/config.yml (See below)

You can change default loader in  ```app/config/config.yml``` file

```yml
# default value is 'sfk_email_template.loader.twig'
sfk_email_template:
    default_loader: service_name
```

---

### There are 3 loaders available at the moment:

* Twig (Renders emails from Twig templates)

```php 
$this->get('sfk_email_template.loader.twig')
    ->load('AcmeDemoBundle::my_template.html.twig', $params)
;
```

* Object (Useful rendering emails from database or just objects)

```php 
$this->get('sfk_email_template.loader.object')
    ->load($entity, $params)
;
```

* Chain (Makes possible to chain many loaders)
