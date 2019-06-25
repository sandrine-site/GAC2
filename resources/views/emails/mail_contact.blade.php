<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
 <p>
Message reçu via le formulaire de contact
   <ul>
   <li> Nom : {{$name}} </li>
   <li>Email : {{$email}}</li>
   <li>@if($club=="club") Adherent de GAC
   @else Non adherent
   @endisset
   </li>
   <li> Sujet: {{$subject}}</li>
   <li> Message : {{$content}}</li>
 </ul> </p>

   <img src="http://localhost/GAC3/resources/images/logo.png" style="width:200px;">
     </body>
</html>
