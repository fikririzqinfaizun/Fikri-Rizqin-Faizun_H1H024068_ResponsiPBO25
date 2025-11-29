<?php
require_once 'Pokemon.php';

class Paras extends Pokemon {
    public function __construct() {
        $name = 'Paras';
        $types = ['Bug', 'Grass'];
        $initialLevel = 1; 
        $baseHp = 10;
        $abilities = ['Effect Spore', 'Dry Skin', 'Damp (hidden)'];
        $specialMove = 'Spore';

        parent::__construct($name, $types, $initialLevel, $baseHp, $abilities, $specialMove);
    }

    public function specialMove(): string {
        $move = $this->getSpecialMove();
        return "{$this->getName()}'s special move is {$move}: a status move that can put the opponent to sleep (simulated here as description). Abilities like Effect Spore may also inflict status when touched.";
    }

    public function train(string $trainingType, int $intensity): array {
        $beforeLevel = $this->getLevel();
        $beforeHp = $this->getHp();

        $levelGain = max(0, (int) floor($intensity / 8)); 
        $hpGain = max(1, (int) floor($intensity / 4)); 

        $trainingTypeLower = strtolower($trainingType);
        if ($trainingTypeLower === 'defense' || $trainingTypeLower === 'stamina') {
            $levelGain = (int) ceil($levelGain * 1.25);
            $hpGain = (int) ceil($hpGain * 1.25);
            $descType = "Paras loves endurance training (type advantage).";
        } elseif ($trainingTypeLower === 'speed') {
            $levelGain = (int) floor($levelGain * 0.6);
            $hpGain = (int) floor($hpGain * 0.8);
            $descType = "Speed training is harder for Paras (low base Speed).";
        } else {
            $descType = "General training.";
        }

        $newLevel = $beforeLevel + $levelGain;
        $newHp = $beforeHp + $hpGain;

        if ($levelGain === 0) $levelGain = 1; 
        $newLevel = $beforeLevel + $levelGain;

        $this->setLevel($newLevel);
        $this->setHp($newHp);

        $desc = "{$descType} Performed {$trainingType} training with intensity {$intensity}. (+{$levelGain} level, +{$hpGain} HP)";

        return [
            'type' => $trainingType,
            'intensity' => $intensity,
            'level_before' => $beforeLevel,
            'level_after' => $this->getLevel(),
            'hp_before' => $beforeHp,
            'hp_after' => $this->getHp(),
            'time' => date('Y-m-d H:i:s'),
            'description' => $desc,
            'special_move_desc' => $this->specialMove()
        ];
    }
}
