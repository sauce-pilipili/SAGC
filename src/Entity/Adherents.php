<?php

namespace App\Entity;

use App\Repository\AdherentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdherentsRepository::class)
 */
class Adherents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *@Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Votre nom doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Votre nom ne doit pas dépasser {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Votre prénom doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Votre prénom ne doit pas dépasser {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuDeNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $departementDeNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discipline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Assert\Regex(
     *     pattern="/^(0|\+33 )[1-9]([-. ]?[0-9]{2} ){3}([-. ]?[0-9]{2})$/",
     *     match=true,
     *     message="Le numéro de téléphone n'est pas valide: XX XX XX XX XX séparation par un espace"
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoIdentite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDupere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomDuPere;

    /**
     * @Assert\Regex(
     *     pattern="/^(0|\+33 )[1-9]([-. ]?[0-9]{2} ){3}([-. ]?[0-9]{2})$/",
     *     match=true,
     *     message="Le numéro de téléphone n'est pas valide: XX XX XX XX XX séparation par un espace"
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneDuPere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseDuPere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeDuPere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostalDuPere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDeLaMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomDeLaMere;

    /**
     * @Assert\Regex(
     *     pattern="/^(0|\+33 )[1-9]([-. ]?[0-9]{2} ){3}([-. ]?[0-9]{2})$/",
     *     match=true,
     *     message="Le numéro de téléphone n'est pas valide: XX XX XX XX XX séparation par un espace"
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneDeLaMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseDeLaMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeDeLaMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostalDeLaMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $professionDuPere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $professionDeLaMere;

    /**
     * @Assert\IsTrue(message="Vous devez accepter les modalités de pratique")
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $modaliteDePratique;

    /**
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autorisationPriseDeVue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autorisationActiviteSagc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $connaissanceInfoNoticeAssuranceDommageCorpo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autorisationDeQuitterLesLieuxEnFinActivite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autorisationPratiqueANiveauSup;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autorisationPriseEnChargeMedicaleAccident;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $engagementDeplacementCompetition;

    /**
     * @Assert\IsTrue(message="Vous devez accepter le reglement interieur")
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $connaissanceReglementInterieur;

    /**
     * @Assert\IsTrue(message="Vous devez valider avoir répondu avec honneteté et excactitude")
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $certificationSurHonneurExcactitdueRenseignement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $certificatMedical;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $questionnaireSanteSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $attestationSanteSport;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $locationDePatin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pointureDesPatins;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGenre(): ?bool
    {
        return $this->genre;
    }

    public function setGenre(bool $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieuDeNaissance;
    }

    public function setLieuDeNaissance(?string $lieuDeNaissance): self
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    public function getDepartementDeNaissance(): ?string
    {
        return $this->departementDeNaissance;
    }

    public function setDepartementDeNaissance(?string $departementDeNaissance): self
    {
        $this->departementDeNaissance = $departementDeNaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getDiscipline(): ?string
    {
        return $this->discipline;
    }

    public function setDiscipline(?string $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPhotoIdentite(): ?string
    {
        return $this->photoIdentite;
    }

    public function setPhotoIdentite(?string $photoIdentite): self
    {
        $this->photoIdentite = $photoIdentite;

        return $this;
    }

    public function getNomDupere(): ?string
    {
        return $this->nomDupere;
    }

    public function setNomDupere(?string $nomDupere): self
    {
        $this->nomDupere = $nomDupere;

        return $this;
    }

    public function getPrenomDuPere(): ?string
    {
        return $this->prenomDuPere;
    }

    public function setPrenomDuPere(?string $prenomDuPere): self
    {
        $this->prenomDuPere = $prenomDuPere;

        return $this;
    }

    public function getTelephoneDuPere(): ?string
    {
        return $this->telephoneDuPere;
    }

    public function setTelephoneDuPere(?string $telephoneDuPere): self
    {
        $this->telephoneDuPere = $telephoneDuPere;

        return $this;
    }

    public function getAdresseDuPere(): ?string
    {
        return $this->adresseDuPere;
    }

    public function setAdresseDuPere(?string $adresseDuPere): self
    {
        $this->adresseDuPere = $adresseDuPere;

        return $this;
    }

    public function getVilleDuPere(): ?string
    {
        return $this->villeDuPere;
    }

    public function setVilleDuPere(?string $villeDuPere): self
    {
        $this->villeDuPere = $villeDuPere;

        return $this;
    }

    public function getCodePostalDuPere(): ?string
    {
        return $this->codePostalDuPere;
    }

    public function setCodePostalDuPere(?string $codePostalDuPere): self
    {
        $this->codePostalDuPere = $codePostalDuPere;

        return $this;
    }

    public function getNomDeLaMere(): ?string
    {
        return $this->nomDeLaMere;
    }

    public function setNomDeLaMere(?string $nomDeLaMere): self
    {
        $this->nomDeLaMere = $nomDeLaMere;

        return $this;
    }

    public function getPrenomDeLaMere(): ?string
    {
        return $this->prenomDeLaMere;
    }

    public function setPrenomDeLaMere(?string $prenomDeLaMere): self
    {
        $this->prenomDeLaMere = $prenomDeLaMere;

        return $this;
    }

    public function getTelephoneDeLaMere(): ?string
    {
        return $this->telephoneDeLaMere;
    }

    public function setTelephoneDeLaMere(?string $telephoneDeLaMere): self
    {
        $this->telephoneDeLaMere = $telephoneDeLaMere;

        return $this;
    }

    public function getAdresseDeLaMere(): ?string
    {
        return $this->adresseDeLaMere;
    }

    public function setAdresseDeLaMere(?string $adresseDeLaMere): self
    {
        $this->adresseDeLaMere = $adresseDeLaMere;

        return $this;
    }

    public function getVilleDeLaMere(): ?string
    {
        return $this->villeDeLaMere;
    }

    public function setVilleDeLaMere(?string $villeDeLaMere): self
    {
        $this->villeDeLaMere = $villeDeLaMere;

        return $this;
    }

    public function getCodePostalDeLaMere(): ?string
    {
        return $this->codePostalDeLaMere;
    }

    public function setCodePostalDeLaMere(?string $codePostalDeLaMere): self
    {
        $this->codePostalDeLaMere = $codePostalDeLaMere;

        return $this;
    }

    public function getProfessionDuPere(): ?string
    {
        return $this->professionDuPere;
    }

    public function setProfessionDuPere(?string $professionDuPere): self
    {
        $this->professionDuPere = $professionDuPere;

        return $this;
    }

    public function getProfessionDeLaMere(): ?string
    {
        return $this->professionDeLaMere;
    }

    public function setProfessionDeLaMere(?string $professionDeLaMere): self
    {
        $this->professionDeLaMere = $professionDeLaMere;

        return $this;
    }

    public function getModaliteDePratique(): ?bool
    {
        return $this->modaliteDePratique;
    }

    public function setModaliteDePratique(?bool $modaliteDePratique): self
    {
        $this->modaliteDePratique = $modaliteDePratique;

        return $this;
    }

    public function getAutorisationPriseDeVue(): ?bool
    {
        return $this->autorisationPriseDeVue;
    }

    public function setAutorisationPriseDeVue(?bool $autorisationPriseDeVue): self
    {
        $this->autorisationPriseDeVue = $autorisationPriseDeVue;

        return $this;
    }

    public function getAutorisationActiviteSagc(): ?bool
    {
        return $this->autorisationActiviteSagc;
    }

    public function setAutorisationActiviteSagc(?bool $autorisationActiviteSagc): self
    {
        $this->autorisationActiviteSagc = $autorisationActiviteSagc;

        return $this;
    }

    public function getConnaissanceInfoNoticeAssuranceDommageCorpo(): ?bool
    {
        return $this->connaissanceInfoNoticeAssuranceDommageCorpo;
    }

    public function setConnaissanceInfoNoticeAssuranceDommageCorpo(?bool $connaissanceInfoNoticeAssuranceDommageCorpo): self
    {
        $this->connaissanceInfoNoticeAssuranceDommageCorpo = $connaissanceInfoNoticeAssuranceDommageCorpo;

        return $this;
    }

    public function getAutorisationDeQuitterLesLieuxEnFinActivite(): ?bool
    {
        return $this->autorisationDeQuitterLesLieuxEnFinActivite;
    }

    public function setAutorisationDeQuitterLesLieuxEnFinActivite(?bool $autorisationDeQuitterLesLieuxEnFinActivite): self
    {
        $this->autorisationDeQuitterLesLieuxEnFinActivite = $autorisationDeQuitterLesLieuxEnFinActivite;

        return $this;
    }

    public function getAutorisationPratiqueANiveauSup(): ?bool
    {
        return $this->autorisationPratiqueANiveauSup;
    }

    public function setAutorisationPratiqueANiveauSup(?bool $autorisationPratiqueANiveauSup): self
    {
        $this->autorisationPratiqueANiveauSup = $autorisationPratiqueANiveauSup;

        return $this;
    }

    public function getAutorisationPriseEnChargeMedicaleAccident(): ?bool
    {
        return $this->autorisationPriseEnChargeMedicaleAccident;
    }

    public function setAutorisationPriseEnChargeMedicaleAccident(?bool $autorisationPriseEnChargeMedicaleAccident): self
    {
        $this->autorisationPriseEnChargeMedicaleAccident = $autorisationPriseEnChargeMedicaleAccident;

        return $this;
    }

    public function getEngagementDeplacementCompetition(): ?bool
    {
        return $this->engagementDeplacementCompetition;
    }

    public function setEngagementDeplacementCompetition(?bool $engagementDeplacementCompetition): self
    {
        $this->engagementDeplacementCompetition = $engagementDeplacementCompetition;

        return $this;
    }

    public function getConnaissanceReglementInterieur(): ?bool
    {
        return $this->connaissanceReglementInterieur;
    }

    public function setConnaissanceReglementInterieur(?bool $connaissanceReglementInterieur): self
    {
        $this->connaissanceReglementInterieur = $connaissanceReglementInterieur;

        return $this;
    }

    public function getCertificationSurHonneurExcactitdueRenseignement(): ?bool
    {
        return $this->certificationSurHonneurExcactitdueRenseignement;
    }

    public function setCertificationSurHonneurExcactitdueRenseignement(?bool $certificationSurHonneurExcactitdueRenseignement): self
    {
        $this->certificationSurHonneurExcactitdueRenseignement = $certificationSurHonneurExcactitdueRenseignement;

        return $this;
    }

    public function getCertificatMedical(): ?string
    {
        return $this->certificatMedical;
    }

    public function setCertificatMedical(?string $certificatMedical): self
    {
        $this->certificatMedical = $certificatMedical;

        return $this;
    }

    public function getQuestionnaireSanteSport(): ?string
    {
        return $this->questionnaireSanteSport;
    }

    public function setQuestionnaireSanteSport(?string $questionnaireSanteSport): self
    {
        $this->questionnaireSanteSport = $questionnaireSanteSport;

        return $this;
    }

    public function getAttestationSanteSport(): ?string
    {
        return $this->attestationSanteSport;
    }

    public function setAttestationSanteSport(?string $attestationSanteSport): self
    {
        $this->attestationSanteSport = $attestationSanteSport;

        return $this;
    }

    public function getLocationDePatin(): ?bool
    {
        return $this->locationDePatin;
    }

    public function setLocationDePatin(?bool $locationDePatin): self
    {
        $this->locationDePatin = $locationDePatin;

        return $this;
    }

    public function getPointureDesPatins(): ?int
    {
        return $this->pointureDesPatins;
    }

    public function setPointureDesPatins(?int $pointureDesPatins): self
    {
        $this->pointureDesPatins = $pointureDesPatins;

        return $this;
    }
}
