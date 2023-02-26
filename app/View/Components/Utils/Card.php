<?php

namespace App\View\Components\Utils;

use Illuminate\View\Component;

class Card extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */

  public $title;
  public $class;
  public $bodyClass;
  public $id;

  public function __construct(
    string $title = null,
    string $class = null,
    string $bodyClass = null,
    string $id = null
  ) {
    $this->title = $title;
    $this->class = $class;
    $this->bodyClass = $bodyClass;
    $this->id = $id;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.utils.card');
  }
}
