<?php


namespace App\Suport;

class Message
{

    private $text;

    private $type;

    /**
     * @param string $text
     * @param string $type
     * @return Message
     */
    public function render(string $text, string $type): Message
    {
        $this->text = $text;
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'message' => $this->text,
            'type' => $this->type
        ];
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode([
            'message' => $this->text,
            'type' => $this->type
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $text
     * @return Message
     */
    public function setText(string $text): Message
    {
        $this->text = filter_var($text, FILTER_SANITIZE_STRIPPED);
        return $this;
    }

    /**
     * @param string $type
     * @return Message
     */
    public function setType(string $type): Message
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

}
