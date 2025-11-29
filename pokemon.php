<?php
abstract class Pokemon {
    private string $name;
    private array $types;
    private int $level;
    private int $hp;
    private int $baseHp;
    private array $abilities;
    private string $specialMove;

    public function __construct(string $name, array $types, int $level, int $baseHp, array $abilities, string $specialMove) {
        $this->name = $name;
        $this->types = $types;
        $this->level = $level;
        $this->baseHp = $baseHp;
        $this->hp = $baseHp;
        $this->abilities = $abilities;
        $this->specialMove = $specialMove;
    }

    public function getName(): string { return $this->name; }
    public function getTypes(): array { return $this->types; }
    public function getLevel(): int { return $this->level; }
    public function getHp(): int { return $this->hp; }
    public function getBaseHp(): int { return $this->baseHp; }
    public function getAbilities(): array { return $this->abilities; }
    public function getSpecialMove(): string { return $this->specialMove; }

    public function setLevel(int $lvl) {
        if ($lvl < 1) $lvl = 1;
        $this->level = $lvl;
    }
    public function setHp(int $hp) {
        if ($hp < 1) $hp = 1;
        $this->hp = $hp;
    }

    abstract public function specialMove(): string;

    public function train(string $trainingType, int $intensity): array {
        $beforeLevel = $this->level;
        $beforeHp = $this->hp;

        $levelGain = max(0, (int) floor($intensity / 10));
        $hpGain = max(1, (int) floor($intensity / 5));

        $this->level += $levelGain;
        $this->hp += $hpGain;

        $desc = "Trained $trainingType with intensity $intensity. Gained +$levelGain level(s) and +$hpGain HP.";

        return [
            'type' => $trainingType,
            'intensity' => $intensity,
            'level_before' => $beforeLevel,
            'level_after' => $this->level,
            'hp_before' => $beforeHp,
            'hp_after' => $this->hp,
            'time' => date('Y-m-d H:i:s'),
            'description' => $desc
        ];
    }
}
