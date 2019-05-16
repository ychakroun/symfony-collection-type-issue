<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Link.
 *
 * @ORM\Entity
 */
class Link
{
    /**
     * @var mixed
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", nullable=true)
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="external", type="boolean")
     */
    private $external;

    /**
     * @var string|null
     *
     * @Assert\NotBlank(groups={"isExternal"})
     * @Assert\Url(groups={"isExternal"})
     * @ORM\Column(name="url", type="text", nullable=true)
     */
    private $url;

    /**
     * @var string|null
     * @Assert\NotBlank(groups={"isInternal"})
     * @ORM\Column(name="redirection", type="string", nullable=true)
     */
    private $redirection;

    /**
     * @var \App\Entity\Footer|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Footer", inversedBy="links")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="footer_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $footer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getExternal(): ?bool
    {
        return $this->external;
    }

    public function setExternal(bool $external): self
    {
        $this->external = $external;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getRedirection(): ?string
    {
        return $this->redirection;
    }

    public function setRedirection(?string $redirection): self
    {
        $this->redirection = $redirection;

        return $this;
    }

    public function getFooter(): ?Footer
    {
        return $this->footer;
    }

    public function setFooter(?Footer $footer): self
    {
        $this->footer = $footer;

        return $this;
    }
}
