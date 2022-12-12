<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
class Video
{
    const VIDEO_ADDED_SUCCESSFULLY = 'VIDEO_ADDED_SUCCESSFULLY';
    const VIDEO_INVALID_FORM = 'VIDEO_INVALID_FORM';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: '3')]
    #[ORM\Column(length: 255)]
    private ?string $title;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail;

    #[Assert\File(maxSize: '4096k', mimeTypes: ['video/mp4'])]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $videoFile;

    #[ORM\ManyToOne(targetEntity: Visibility::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Visibility $visibility;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getVideoFile(): ?string
    {
        return $this->videoFile;
    }

    public function setVideoFile(string $videoFile): self
    {
        $this->videoFile = $videoFile;

        return $this;
    }

    public function getVisibility(): ?Visibility
    {
        return $this->visibility;
    }

    public function setVisibility(?Visibility $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }
}
