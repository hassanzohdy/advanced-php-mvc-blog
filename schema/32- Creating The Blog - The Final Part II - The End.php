<?php
|--
|- Creating The Blog The Final Part II : The End
|-
|- Content
|- Fixing Remember Me In login "With Cookies"
|- Validating "Unique" Emails while creating-updating users in admin panel
|- Creating Registration Page
|- Creating Login Page
|- Creating Category Page
|- Creating Pagination Class
|- Creating Post Page
|- Creating Comments
|- Creating Profile Page => Will Be Assigned as task
|- Creating Search Page  => Will Be Assigned as task
|- Creating Contact Us Page   => Will Be Assigned as task
|- Creating About Us Page   => Will Be Assigned as task
|- Creating Slideshow Module "In Back And Front Office" => Will Be Assigned as task
|- The End ?

|- Extras
|- Redirect the user after registration to welcome page And offer him a login link to make a login -> that's yooour issue'
|- Add in Settings page new option that to Auto login the user after registration or not
|- Add another feature in settings page to select the users group that the user will be registered with
|- Add Another feature to make the user auto-approved and auto-activated account after registration
|- Activate User account By Email
|- Add "About" For the user ... just a word about him
|- Limit the items per page from settings page
|- Add Social Links in settings page and add it to footer
|-
|-  The End ?
|-
|- This is just the beginning
|-
|- Season 2 Or The Series Part II
|-
|- More Securiy + Encryption
|- using Google recaptcha - CSRF Token.. etc
|- Caching !
|- More Advanced Router
|- Ajax Post Request
|- I will just make something like that for filtration
|- $this->app->route->add('/my-url', 'MyController', 'AjaxPost')
|- $this->app->route->get('my-url', 'MyController')
|- Equal to
|- $this->app->route->add('my-url', 'MyController', 'GET')
|- $this->app->route->post('my-url', 'MyController')
|- Equal to
|- $this->app->route->add('my-url', 'MyController', 'POST')
|-
|- Database Query Builder
|- What Can be made later
// this the new query builder
$this->db->select('t.id', 't2.name')
         ->from('my table', 'm')// m here is the alias
         ->join('table2', 't2')->on('t.id', 't2.t_id')// this will be LEFT JOIN alias
         ->leftJoin('table2', 't2')->on('t.id', 't2.t_id')// this will be LEFT JOIN
         ->rightJoin('table2', 't2')->on('t.id', 't2.t_id')// this will be RIGHT JOIN
         ->innerJoin('table2', 't2')->on('t.id', 't2.t_id')// this will be INNER JOIN
         ->where('t.id', 5)
         ->andWhere('t2.name' , 'hasan')
         ->andWhere('t.id', '<=' , 2)
         ->andWhereLike('t2.name' , 'has')
         ->having('total', '>' , 10)


// current equivalent query builder
$this->db->select('t.id', 't2.name')
         ->from('my table m')
         ->join('LEFT JOIN t.id = t2.t_id')
         ->where('t.id=? AND t2.name=? AND t.id<=?', 5, 'hasan', 2)

|- Social Login
|- Social Sharing
|- Category Tree
|- Multi Language support
|- Custom Template Engine
|- Modules System
|- i.e Ads We can set it on custom pages only and in custom section
|- For we can set some ads before or after blog post display
|-
|- What Else You Can Do
|- Ajax Pagination => without reloading the page
|- Auto complete search => ajax search
|- Load on scroll => Ajax load => Another Approch for pagination
|- Ajax Adding Comments
--|
?>