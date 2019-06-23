<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
<style>
  @page {
    margin: 50px 50px 25px 50px;

    }

</style>
</head>
<body>

  <header><img src="images\logo.png"style="width: 200px;"></header>
  <main>
    <article>
      <div class="cadre">

        <h2>Dossier d'inscription de {{$adherentData['nom']}} {{$adherentData['prenom']}} </h2>

        <p>  Pour les enfants mineurs inscrits à l'association G.A.C. </p>
        <div class="left">
          Je,soussigné(e) (Nom Prénom du parent) :......................................................<br/>
          Père,   Mère,   tuteur <div class="xx-small" style="font-size: xx-small">rayer la mention inutile</div>
          de l'enfant: {{$adherentData['nom']}} {{$adherentData['prenom']}}</div>
        <h3>AUTORISATION PARENTALE FIN D’ENTRAINEMENT</h3>
        <p>Afin de garantir la sécurité de tous, nous vous rappelons que nous ne sommes pas en mesure de laisser partir vos enfants  seuls  à  la  fin  de  leur(s)  entraînement(s).  Nous  vous  demandons  donc  de  venir  les  récupérer, saufautorisation écrite de votre part (cf. ci après).En cas d’autorisation exceptionnelle, merci de bien vouloir nous transmettre préalablement la demande par écrit. De plus, nous vous conseillons de vous assurer de la présence des entraîneurs  avant de laisser votre enfant seul sur le parking.</p>
        <strong>En raison des mesures de sécurité du plan Vigipirate l'accès au gymnase ne sera possible que 10 minutes avant le début des cours.</strong>
        Vous déclarez:
        <div class="left">
          @if ($adherentData["sortie"]==1)
            <ul>
            <li style="list-style-type: square;"> Autorise mon fils ou ma fille {{$adherentData['nom']}} {{$adherentData['prenom']}} à quitter seul(e) le lieu d'entraînement ou de compétition et cela sous ma responsabilité.</li>
            <div class="xx-small" style="font-size: xx-small">N' autorise pas mon fils ou ma fille .................................... à quitter seul(e) le lieu d'entraînement ou de compétition et cela sous ma responsabilité.</div>
            </ul>
          @else
            <ul>
              <li style="list-style-type: square;">N' autorise pas mon fils ou ma fille {{$adherentData['nom']}} {{$adherentData['prenom']}} à quitter seul(e) le lieu d'entraînement ou de compétition</li>
            <div class="xx_small" style="font-size: xx-small">Autorise mon fils ou ma fille.................................... à quitter seul(e) le lieu d'entraînement ou de compétition et cela sous ma responsabilité.</div>
            </ul>
          @endif
        </div><br/><br/>
        <div class="signature">
          <div class="demi">
            A ...........................................<br/>
            Le ..........................................
          </div>
          <div class="demi xx-small" style="font-size: xx-small">
            Veuillez dater, signer avec la mention « Lu et Approuvé »<br/>
            En cas d'erreur veuillez corriger en rouge
            <div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-break" style="page-break-after: always"></div>
      <div class="cadre">
        <h2>Utilisation de photos des adhérents  par l'association G.A.C.</h2>
        @if($adherentData["age"]<18)
          <div class="left">
            Je, soussigné :....................................... Père,   Mère,   tuteur <div class="xx-small" style="font-size: xx-small">rayer la mention inutile</div>
            de l'enfant  {{$adherentData['nom']}} {{$adherentData['prenom']}}
            vous déclarez:
            @if ($adherentData["media"]==1)
              <ul>
                         <li style="list-style-type: square;">Autoriser l'association G.A.C. à utiliser sans contrepartie  la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</li>
              <div class="xx-small" style="font-size: xx-small">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie  la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</div>
              </ul>
            @else
              <ul>
             <li style="list-style-type: square;">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</li>
              <div class="xx_small" style="font-size: xx-small">Autoriser l'association G.A.C. à utiliser sans contrepartie la photo de mon enfant prise dans le cadre des activités de l'association G.A.C.</div>
                @endif
                @else
                  Je, soussigné  {{$adherentData['nom']}} {{$adherentData['prenom']}}
                  declare:
                  @if ($adherentData["media"]==1)
                    <ul>
                 <li style="list-style-type: square;"> Autoriser l'association G.A.C. à utiliser sans contrepartie ma photo prise dans le cadre des activités de l'association G.A.C.</li>
                <div class="xx-small" style="font-size: xx-small">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie ma photo  prise dans le cadre des activités de l'association G.A.C.</div>
                    </ul>
                  @else
                    <ul>
                 <li style="list-style-type: square;">Ne pas autoriser l'association G.A.C. à utiliser sans contrepartie ma photo prise dans le cadre des activités de l'association G.A.C.</li>
                <div class="xx_small" style="font-size: xx-small">Autoriser l'association G.A.C. à utiliser sans contrepartie ma photo  prise dans le cadre des activités de l'association G.A.C.</div>
                     </ul>
                  @endif
                @endif
                <ul>
              <li> pour le journal</li>
              <li>pour le Clapiers Info</li>
              <li> pour les sites internet</li>
              <li>Pour la communication interneau club.</li>
              <li> pour la réalisation d'un CD(films,vidéos)</li>
            </ul>
          </div>
          <br/><br/>
          <div class="signature">
            <div class="demi">
              A ...........................................<br/>
              Le ..........................................
            </div>
            <div class="demi xx-small" style="font-size: xx-small">
              Veuillez dater, signer avec la mention « Lu et Approuvé »<br/>
              En cas d'erreur veuillez corriger en rouge
              <div>
              </div>
            </div>
          </div>
      </div>
    </article>

   <hr/>
    <article>
      <div class="cadre">
        <h2>Autorisation de premiers soins</h2>
        @if($adherentData["age"]<18)
          <div class="left">
            Je, soussigné :....................................... Père,   Mère,   tuteur <div class="xx-small" style="font-size: xx-small">rayer la mention inutile</div>
            de l'enfant  {{$adherentData['nom']}} {{$adherentData['prenom']}}
            vous déclarez:
            @if ($adherentData["urgence"]==1)
              <ul>
                <li style="list-style-type: square;">  Habilite et autorise les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention reconnus médicalement nécessaires auprès de mon enfant.</li>>
              </ul>
            @else
              <ul>
                  <li style="list-style-type: square;"> N'habilite pas et n'autorise pas les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention reconnus médicalement nécessaires auprès de mon enfant .</li>
              </ul>
            @endif
            @else
            Je, soussigné  {{$adherentData['nom']}} {{$adherentData['prenom']}}
            declare:
              @if ($adherentData["urgence"]==1)
                <ul>
                <li style="list-style-type: square;">   Habilite et autorise les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention qui me sont reconnus médicalement nécessaires.</li>
                  </ul>
              @else
                <ul>
                                <li style="list-style-type: square;">>N'habilite pas et n'autorise pas les animateurs à la mise en oeuvre en cas d'urgence, des traitements, hospitalisation et intervention qui me sont reconnus médicalement nécessaires  .</li>
                </ul>
              @endif
            @endif
          </div>
          <br/><br/>
          <div class="signature">
            <div class="demi">
              A ...........................................<br/>
              Le ..........................................
            </div>
            <div class="demi xx-small" style="font-size: xx-small">
              Veuillez dater, signer avec la mention « Lu et Approuvé »<br/>
              En cas d'erreur veuillez corriger en rouge
              <div>
              </div>
            </div>
          </div>
      </div>
      <hr/>
      <div class="cadre">
        <h2>Autorisation de déplacements</h2>
        <p> Pour les enfants mineurs inscrits à l'association G.A.C. </p>
        <div class="left">
          Je, soussigné :....................................... Père,   Mère,   tuteur <div class="xx-small" style="font-size: xx-small">rayer la mention inutile</div>
          de l'enfant  {{$adherentData['nom']}} {{$adherentData['prenom']}}
          vous déclarez:
          @if ($adherentData["deplacements"]==1)
            <ul>
                            <li style="list-style-type: square;">  Habilite et autorise Les animateurs et les officiels à transporter mon enfant lors des déplacements durant les divers événements de la saison. </li>
            </ul>
          @else
            <ul>
                                                <li style="list-style-type: square;">N'habilite pas et n'autorise pas Les animateurs et les officiels à transporter mon enfant lors des déplacements durant les divers événements de la saison. </li>

                                </ul>
          @endif
        </div>
        <br/><br/>
        <div class="signature">
          <div class="demi">
            A ...........................................<br/>
            Le ..........................................
          </div>
          <div class="demi xx-small" style="font-size: xx-small">
            Veuillez dater, signer avec la mention « Lu et Approuvé »<br/>
            En cas d'erreur veuillez corriger en rouge
            <div>
            </div>
          </div>
        </div>
      </div>
      <hr/>
            <div class="cadre">

              <h2>Pour rappel tarif</h2>
              @if ($adherentData["tarifCours"]!=0)
              <div class="tarif">
        @if ($adherentData["tarifLicence"]!=0)
      <p>Licence UFOLEP _____________  {{$adherentData['tarifLicence']}} €<br/>
      @endif
                Adhesion GAC _______________  {{$adherentData['tarifAdhesion']}} €<br/>
          Tarif cours ___________________  {{$adherentData['tarifCours']}} €<br/>
         TOTAL _____________________{{$adherentData['tarifLicence']+$adherentData['tarifAdhesion']+$adherentData['tarifCours']}} €</p>
@else <h3>Nous ne sommes pas en mesure de calculer le prix de votre adhésion.
       Veuillez vous rapprocher de votre entraineur afin d'avoir le prix. </h3>
       @endif
              </div>

 <p> Possibilité de payer par Chèques Vacances et Coupon SportPaiement, <br/>
     Paiement en trois fois  possible avant le 15 Janvier  par exemple 15 octobre, 15 Novembre, 15 décembre.(à noter au dos des chèques).
    <h4> Documents à fournir :</h4>
    <ul>
      <li>Les autorisations signées</li>
    <li>Certificat médical  ou attestation de santé (pour les anciens)</li>
      <li>Une enveloppe timbrée</li>
      <li>Une photo  pour les adhérents "compétition"</li>
    </ul>

            </div>
    </article>

  </main>
</body>
</html>

