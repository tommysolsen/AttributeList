<?

namespace Apility\AttributeList;

class AttributeList {
  private $list;

  public function __construct ($list = []) {
    $this->list = $list;
  }

  /**
   * Add attribute
   *
   * @param string $name Attribute name
   * @param mixed $content Content of attribute
   * @return AttributeList self
   */
  public function addAttribute($name, $content) {
    $this->list[$name] = $content;
    return $this;
  }

  /**
   * Outputs the attribute list as a string for use in markup
   *
   * @return string Attribute list for use in markup
   */
  public function toString() {
    $listKeys = array_keys($this->list);

    $filteredKeys = array_filter($listKeys, function ($key) {
      return $this->list[$key] !== null;
    });

    $attributeStringPairs = array_map(function ($key) {
      if (is_bool($this->list[$key])) {
        return $this->list[$key] ? $key : '';
      }

      return $key . '="' . $this->list[$key] . '"';
    }, $filteredKeys);

    return implode(' ', $attributeStringPairs);
  }

  /**
   * Outputs the attribute list as a string for use in Vue templates
   *
   * @return string Attribute list for use in Vue templates
   */
  public function toVuePropsString() {
    $listKeys = array_keys($this->list);

    $filteredKeys = array_filter($listKeys, function ($key) {
      return $this->list[$key] !== null;
    });

    $propStringPairs = array_map(function ($key) {
      $hyphenatedKey = strtolower(preg_replace('/([A-Z])/', '-$1', $key));

      if (is_bool($this->list[$key])) {
        return $this->list[$key] ? $hyphenatedKey : '';
      } else if (
        is_array($this->list[$key])
        || is_object($this->list[$key])
        || ($this->list[$key] instanceof Illuminate\Support\Collection)
      ) {
        return ':' . $hyphenatedKey . "=\"" . htmlentities(json_encode($this->list[$key])) . "\"";
      } else if (is_int($this->list[$key]) || is_float($this->list[$key])) {
        return ':' . $hyphenatedKey . "=\"" . $this->list[$key] . "\"";
      }

      return $hyphenatedKey . '="' . htmlentities($this->list[$key]) . '"';

    }, $filteredKeys);

    return implode(' ', $propStringPairs);
  }

  /**
   * Get length of attribute list
   *
   * @return int Length of attribute list
   */
  public function length() {
    return count($this->list);
  }
}
