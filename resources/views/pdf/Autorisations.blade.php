<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
<style>

</style>
</head>
<body>
  <header><img src="{{asset('/public/images/logo.png')}}"style="width: 200px;"></header>
  <main>

    <article>
      <div class="cadre">
        <h3>Dossier d'inscription de {{$adherentData['nom']}} {{$adherentData['prenom']}} </h3>
        <p> né(e) le {{$adherentData['dateNaissance']}} à {{$adherentData['lieuNaissance']}} -  sexe : {{$adherentData['sexe']}}</p>
       <p> téléphone responsable légal : {{$adherentData["telephone_Resp1"]}}<br/>
        @isset($adherentData["telephone_Resp2" ]) téléphone 2: {{$adherentData["telephone_Resp2" ]}}<br/>
        @endisset
        @isset($adherentData["telephone_adherent" ]) téléphone adhérent: {{$adherentData["telephone_adherent" ]}}
         @endisset</p>
        <p>Adresse:{{$adherentData["adresse" ]}} - {{$adherentData["cp" ]}} &nbsp;{{$adherentData["ville" ]}}</p><br/>
        <p>Email: {{$adherentData["email1" ]}}
        @isset($adherentData["email2"]) Email2 : {{$adherentData["email2" ]}}
          @endisset</p>
       <p> Inscrit(e) en : {{$adherentData['section']->nom}} -
        temps d'entrainement :{{$adherentData["heureSemaine" ]}} par semaine
        @isset($adherentData["entrainement" ]) Remarques concernant l'entrainement : {{$adherentData["entrainement" ]}}<br/>
         @endisset</p>
        <p> Personne à prévenir en cas d'urgence :{{$adherentData["nomUrgence" ]}} - téléphone : {{$adherentData["telUrgence"]}}<br/>
          @isset($adherentData["medicales" ]) Remarques médicales : {{$adherentData["medicales" ]}}
          @endisset</p>
      </div>
      <div class="cadre" style="width: 100%; border: 1px solid black;padding: 15px;">
        <p> <i style="text-align: center;font-weight: bold"> Pour les enfants mineurs inscrits à l'association G.A.C.</i> </p>
        <div class="left">
          Je, soussigné(e) (Nom prénom du parent) :................................................................<br/>
          Père,   Mère,   tuteur <div class="xx-small" style="font-size: xx-small">rayer la mention inutile</div>
          de l'enfant: {{$adherentData['nom']}} {{$adherentData['prenom']}}</div>
        <h3>AUTORISATION PARENTALE FIN D’ENTRAINEMENT</h3>
        <p>Afin de garantir la sécurité de tous, nous vous rappelons que nous ne sommes pas en mesure de laisser partir vos enfants  seuls  à  la  fin  de  leur(s)  entraînement(s).  Nous  vous  demandons  donc  de  venir  les  récupérer, sauf autorisation écrite de votre part (cf. ci-après).En cas d’autorisation exceptionnelle, merci de bien vouloir nous transmettre préalablement la demande par écrit. De plus, nous vous conseillons de vous assurer de la présence des entraîneurs  avant de laisser votre enfant seul sur le parking.</p>
        <strong>En raison des mesures de sécurité du plan Vigipirate l'accès au gymnase ne sera possible que 10 minutes avant le début des cours.</strong>
        Vous déclarez:
        <div class="left">
          @if ($adherentData["sortie"]==1)
            <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
            <li style="list-style-image:url({{asset('/public/images/coche.png')}})"> Autorise mon fils ou ma fille {{$adherentData['nom']}} {{$adherentData['prenom']}} à quitter seul(e) le lieu d'entraînement ou de compétition et cela sous ma responsabilité.</li>
            <div class="xx-small" style="font-size: xx-small">N' autorise pas mon fils ou ma fille .................................... à quitter seul(e) le lieu d'entraînement ou de compétition et cela sous ma responsabilité.</div>
            </ul>
          @else
            <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
              <li style="list-style-image:url({{asset('/public/images/coche.png')}})">N' autorise pas mon fils ou ma fille {{$adherentData['nom']}} {{$adherentData['prenom']}} à quitter seul(e) le lieu d'entraînement ou de compétition</li>
            <div class="xx_small" style="font-size: xx-small">Autorise mon fils ou ma fille.................................... à quitter seul(e) le lieu d'entraînement ou de compétition et cela sous ma responsabilité.</div>
)____       </ul>
          @endif
        </div>
        <div class="signature">
          <div class="demi"style="margin-left: 30px">
            A ...........................................<br/>
            Le ..........................................
          </div>
          <i class="demi xx-small" style="font-size: xx-small; margin-left: 30px">
            Veuillez dater, signer avec la mention « Lu et Approuvé » -  en cas d'erreur veuillez corriger en rouge.
          </i>
        </div>
      </div>
      <div class="page-break" style="page-break-after: always"></div>
      <div class="cadre" style="width: 100%; border: 1px solid black; padding: 15px;">
        <h3>Utilisation de photos des adhérents  par l'association G.A.C.</h3>
        @if($adherentData["age"]<18)
          <div class="left">
            Je, soussigné :................................................................ Père,   Mère,   tuteur <i style="font-size: xx-small">rayer la mention inutile</i><br/>
            de l'enfant  {{$adherentData['nom']}} {{$adherentData['prenom']}}
            vous déclarez:
            @if ($adherentData["media"]==1)
              <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                         <li style="list-style-image:url({{asset('/public/images/coche.png')}})">Autoriser l'association G.A.C. à utiliser sans contrepartie  la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</li>
              <div class="xx-small" style="font-size: xx-small">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie  la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</div>
              </ul>
            @else
              <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
             <li style="list-style-image:url({{asset('/public/images/coche.png')}})">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</li>
              <div class="xx_small" style="font-size: xx-small">Autoriser l'association G.A.C. à utiliser sans contrepartie la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</div>
                @endif
                @else
                  Je, soussigné  {{$adherentData['nom']}} {{$adherentData['prenom']}}
                  declare:
                  @if ($adherentData["media"]==1)
                    <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">>
                 <li style="list-style-image:url({{asset('/public/images/coche.png')}})"> Autoriser l'association G.A.C. à utiliser sans contrepartie ma photo prise dans le cadre des activités de l'association G.A.C.</li>
                <div class="xx-small" style="font-size: xx-small">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie ma photo  prise dans le cadre des activités de l'association G.A.C.</div>
                    </ul>
                  @else
                    <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">>
                 <li style="list-style-image:url({{asset('/public/images/coche.png')}})">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie ma photo prise dans le cadre des activités de l'association G.A.C.</li>
                <div class="xx_small" style="font-size: xx-small">Autoriser l'association G.A.C. à utiliser sans contrepartie ma photo  prise dans le cadre des activités de l'association G.A.C.</div>
                     </ul>
                  @endif
                @endif
                <ul>
              <li style="list-style-type:square"> pour le journal</li>
              <li style="list-style-type:square"> pour le Clapiers Info</li>
              <li style="list-style-type:square"> pour les sites internet</li>
              <li style="list-style-type:square"> pour la communication interne au club.</li>
              <li style="list-style-type:square"> pour la réalisation d'un CD(films, vidéos)</li>
            </ul>

          <div class="signature" >
            <div class="demi"style="margin-left: 30px">
            A ...........................................<br/>
            Le ..........................................
          </div>
          <i class="demi xx-small" style="font-size: xx-small; margin-left: 30px">
            Veuillez dater, signer avec la mention « Lu et Approuvé » - en cas d'erreur veuillez corriger en rouge.
          </i>
            </div>
      </div>
      </div>
    </article>
<br/>
    <article>
      <div class="cadre" style="width: 100%; border: 1px solid black; padding: 15px;">

        <h3>Autorisation de premiers soins</h3>
        @if($adherentData["age"]<18)
          <div class="left">
            Je, soussigné :....................................... Père,   Mère,   tuteur <i style="font-size: xx-small">rayer la mention inutile</i>
            de l'enfant  {{$adherentData['nom']}} {{$adherentData['prenom']}}
            vous déclarez:
            @if ($adherentData["urgence"]==1)
              <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                <li style="list-style-image:url({{asset('/public/images/coche.png')}})">  Habilite et autorise les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention reconnus médicalement nécessaires auprès de mon enfant.</li>>
              </ul>
            @else
              <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                  <li style="list-style-image:url({{asset('/public/images/coche.png')}})"> N'habilite pas et n'autorise pas les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention reconnus médicalement nécessaires auprès de mon enfant .</li>
              </ul>
            @endif
            @else
            Je, soussigné  {{$adherentData['nom']}} {{$adherentData['prenom']}}
            declare:
              @if ($adherentData["urgence"]==1)
                <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                <li style="list-style-image:url({{asset('/public/images/coche.png')}})">   Habilite et autorise les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention qui me sont reconnus médicalement nécessaires.</li>
                  </ul>
              @else
                <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                                <li style="list-style-image:url({{asset('/public/images/coche.png')}})"> N'habilite pas et n'autorise pas les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention qui me sont reconnus médicalement nécessaires  .</li>
                </ul>
              @endif
            @endif
          </div>
          <br/><br/>
          <div class="signature">
            <div class="demi"style="margin-left: 30px">
            A ...........................................<br/>
            Le ..........................................
          </div>
          <i class="demi xx-small" style="font-size: xx-small; margin-left: 30px">
            Veuillez dater, signer avec la mention « Lu et Approuvé » - en cas d'erreur veuillez corriger en rouge.
          </i>
            </div>
          </div>
    </article>

      <div class="page-break" style="page-break-after: always"></div>
      <div class="cadre" style="width: 100%; border: 1px solid black; padding: 15px;">
        <h3>Autorisation de déplacements</h3>
        <p> Pour les enfants mineurs inscrits à l'association G.A.C. </p>
        <div class="left">
          Je, soussigné :....................................... Père,   Mère,   tuteur <div class="xx-small" style="font-size: xx-small">rayer la mention inutile</div>
          de l'enfant  {{$adherentData['nom']}} {{$adherentData['prenom']}}
          vous déclarez:
          @if ($adherentData["deplacements"]==1)
            <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                            <li style="list-style-image:url({{asset('/public/images/coche.png')}})">  Habilite et autorise Les animateurs et les officiels à transporter mon enfant lors des déplacements durant les divers événements de la saison. </li>
            </ul>
          @else
            <ul style="list-style-image:url({{asset('/public/images/coche.png')}})">
                                                <li style="list-style-image:url({{asset('/public/images/coche.png')}})">N'habilite pas et n'autorise pas Les animateurs et les officiels à transporter mon enfant lors des déplacements durant les divers événements de la saison. </li>

                                </ul>
          @endif
        </div>
        <br/><br/>
        <div class="signature">
          <div class="demi"style="margin-left: 30px">
            A ...........................................<br/>
            Le ..........................................
          </div>
          <i class="demi xx-small" style="font-size: xx-small; margin-left: 30px">
            Veuillez dater, signer avec la mention « Lu et Approuvé »<br/>
            En cas d'erreur veuillez corriger en rouge.
          </i>
          </div>
        </div>

      <hr/>
      <div class="cadre" style="width: 100%;">

              <h3>Pour rappel tarif</h3>
              @if ($adherentData["tarifCours"]!=0)
                <div class="tarif">
        @if ($adherentData["tarifLicence"]!=0)
                    <p>Licence UFOLEP _____________  {{$adherentData['tarifLicence']}} €<br/>
                      @endif
                       Adhesion GAC _______________  {{$adherentData['tarifAdhesion']}} €<br/>
          Tarif cours __________________  {{$adherentData['tarifCours']}} €<br/>
         TOTAL _____________________{{$adherentData['tarifLicence']+$adherentData['tarifAdhesion']+$adherentData['tarifCours']}} €</p>
                  @else <h3>Nous ne sommes pas en mesure de calculer le prix de votre adhésion.
       Veuillez vous rapprocher de votre entraineur. </h3>
                  @endif
              </div>

                <p> Possibilité de payer par Chèques Vacances et Coupon SportPaiement, <br/>
     Paiement en trois fois  possible avant le 15 Janvier  par exemple 15 octobre, 15 Novembre, 15 décembre. (à noter au dos des chèques).
                <h4> Documents à fournir :</h4>
                <ul>
      <li>Les autorisations signées</li>
    <li>Certificat médical  ou attestation de santé (pour les anciens)</li>
      <li>Une enveloppe timbrée</li>
      <li>Une photo  pour les adhérents "compétition"</li>
    </ul>

            </div>


  </main>
</body>
</html>

