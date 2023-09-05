<?php

namespace App\Models;

class Post
{
  private static $posts = [
    [
      'title' => 'Ionian',
      'slug' => 'ionian',
      'content' => "Ionian mode is a musical mode or, in modern usage, a diatonic scale also called the major scale. It is the name assigned by Heinrich Glarean in 1547 to his new authentic mode on C (mode 11 in his numbering scheme), which uses the diatonic octave species from C to the C an octave higher, divided at G (as its dominant, reciting tone/reciting note or tenor) into a fourth species of perfect fifth (tone–tone–semitone–tone) plus a third species of perfect fourth (tone–tone–semitone): C D E F G + G A B C.[1] This octave species is essentially the same as the major mode of tonal music.",
    ],
    [
      'title' => 'Dorian',
      'slug' => 'dorian',
      'content' => "Dorian mode or Doric mode can refer to three very different but interrelated subjects: one of the Ancient Greek harmoniai (characteristic melodic behaviour, or the scale structure associated with it); one of the medieval musical modes; or—most commonly—one of the modern modal diatonic scales, corresponding to the piano keyboard's white notes from D to D, or any transposition of itself.",
    ],
  ];

  public static function all()
  {
    return collect(self::$posts);
  }

  public static function find($slug)
  {
    $post = static::all();
    return $post->firstWhere('slug', $slug);
  }
}
