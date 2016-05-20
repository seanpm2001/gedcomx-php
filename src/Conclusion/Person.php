<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Conclusion;

use Gedcomx\Common\ExtensibleData;
use Gedcomx\Conclusion\Subject;
use Gedcomx\Records\Field;
use Gedcomx\Records\HasFields;
use Gedcomx\Rt\GedcomxModelVisitor;

/**
 * A person.
 */
class Person extends Subject implements HasFacts, HasFields
{
    /**
     * Whether this person is the &quot;principal&quot; person extracted from the record.
     *
     * @var boolean
     */
    private $principal;

    /**
     * Whether this person has been designated for limited distribution or display.
     *
     * @var boolean
     */
    private $private;

    /**
     * Living status of the person as treated by the system.
     *
     * @var boolean
     */
    private $living;

    /**
     * The gender conclusion for the person.
     *
     * @var Gender
     */
    private $gender;

    /**
     * The name conclusions for the person.
     *
     * @var Name[]
     */
    private $names;

    /**
     * The fact conclusions for the person.
     *
     * @var Fact[]
     */
    private $facts;

    /**
     * The references to the record fields being used as evidence.
     *
     * @var Field[]
     */
    private $fields;

    /**
     * Display properties for the person. Display properties are not specified by GEDCOM X core, but as extension elements by GEDCOM X RS.
     *
     * @var DisplayProperties
     */
    private $displayExtension;

    /**
     * Constructs a Person from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     *
     * @throws \Exception
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        }
        else if ($o instanceof \XMLReader) {
            $success = true;
            while ($success && $o->nodeType != \XMLReader::ELEMENT) {
                $success = $o->read();
            }
            if ($o->nodeType != \XMLReader::ELEMENT) {
                throw new \Exception("Unable to read XML: no start element found.");
            }

            $this->initFromReader($o);
        }
    }

    /**
     * Whether this person is the 'principal' person extracted from the record.
     *
     * @return boolean
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Whether this person is the 'principal' person extracted from the record.
     *
     * @param boolean $principal
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;
    }
    /**
     * Whether this person has been designated for limited distribution or display.
     *
     * @return boolean
     */
    public function isPrivate()
    {
        return $this->private;
    }

    /**
     * Whether this person has been designated for limited distribution or display.
     *
     * @param boolean $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }
    /**
     * Living status of the person as treated by the system.
     *
     * @return boolean
     */
    public function isLiving()
    {
        return $this->living;
    }

    /**
     * Living status of the person as treated by the system.
     *
     * @param boolean $living
     */
    public function setLiving($living)
    {
        $this->living = $living;
    }
    /**
     * The gender conclusion for the person.
     *
     * @return Gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * The gender conclusion for the person.
     *
     * @param Gender $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    /**
     * The name conclusions for the person.
     *
     * @return Name[]
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * The name conclusions for the person.
     *
     * @param Name[] $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

    /**
     * Return a fact of a specific type.
     *
     * @param string Fact type
     *
     * @return Fact[]|Fact|null
     */
    public function getFactsOfType($type)
    {
        $facts = array();
        foreach ($this->facts as $f) {
            if ($f->getType() == $type) {
                $facts[] = $f;
            }
        }

        if (empty($facts)) {
            return null;
        } elseif (count($facts) == 1) {
            return $facts[0];
        } else {
            return $facts;
        }
    }

    /**
     * The fact conclusions for the person.
     *
     * @return Fact[]
     */
    public function getFacts()
    {
        return $this->facts;
    }

    /**
     * The fact conclusions for the person.
     *
     * @param Fact[] $facts
     */
    public function setFacts(array $facts)
    {
        $this->facts = $facts;
    }
    /**
     * The references to the record fields being used as evidence.
     *
     * @return Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * The references to the record fields being used as evidence.
     *
     * @param Field[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }
    /**
     * Display properties for the person. Display properties are not specified by GEDCOM X core, but as extension elements by GEDCOM X RS.
     *
     * @return DisplayProperties
     */
    public function getDisplayExtension()
    {
        return $this->displayExtension;
    }

    /**
     * Display properties for the person. Display properties are not specified by GEDCOM X core, but as extension elements by GEDCOM X RS.
     *
     * @param DisplayProperties $displayExtension
     */
    public function setDisplayExtension($displayExtension)
    {
        $this->displayExtension = $displayExtension;
    }
    /**
     * Returns the associative array for this Person
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->principal) {
            $a["principal"] = $this->principal;
        }
        if ($this->private) {
            $a["private"] = $this->private;
        }
        if (isset($this->living)) {
            $a["living"] = $this->living;
        }
        if ($this->gender) {
            $a["gender"] = $this->gender->toArray();
        }
        if ($this->names) {
            $ab = array();
            foreach ($this->names as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['names'] = $ab;
        }
        if ($this->facts) {
            $ab = array();
            foreach ($this->facts as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['facts'] = $ab;
        }
        if ($this->fields) {
            $ab = array();
            foreach ($this->fields as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['fields'] = $ab;
        }
        if ($this->displayExtension) {
            $a["display"] = $this->displayExtension->toArray();
        }
        return $a;
    }


    /**
     * Initializes this Person from an associative array
     *
     * @param array $o
     */
    public function initFromArray(array $o)
    {
        if (isset($o['principal'])) {
            $this->principal = $o["principal"];
            unset($o['principle']);
        }
        if (isset($o['private'])) {
            $this->private = $o["private"];
            unset($o['private']);
        }
        if (isset($o['living'])) {
            $this->living = $o["living"];
            unset($o['living']);
        }
        if (isset($o['gender'])) {
            $this->gender = new Gender($o["gender"]);
            unset($o['gender']);
        }
        $this->names = array();
        if (isset($o['names'])) {
            foreach ($o['names'] as $i => $x) {
                $this->names[$i] = new Name($x);
            }
            unset($o['names']);
        }
        $this->facts = array();
        if (isset($o['facts'])) {
            foreach ($o['facts'] as $i => $x) {
                $this->facts[$i] = new Fact($x);
            }
            unset($o['facts']);
        }
        $this->fields = array();
        if (isset($o['fields'])) {
            foreach ($o['fields'] as $i => $x) {
                $this->fields[$i] = new Field($x);
            }
            unset($o['fields']);
        }
        if (isset($o['display'])) {
            $this->displayExtension = new DisplayProperties($o["display"]);
            unset($o['display']);
        }
        parent::initFromArray($o);
    }

    /**
     * @param \Gedcomx\Rt\GedcomxModelVisitor $visitor
     */
    public function accept(GedcomxModelVisitor $visitor)
    {
        $visitor->visitPerson($this);
    }

    /**
     * Sets a known child element of Person from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement(\XMLReader $xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'living') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->living = $child;
            $happened = true;
        }
        else if (($xml->localName == 'gender') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new Gender($xml);
            $this->gender = $child;
            $happened = true;
        }
        else if (($xml->localName == 'name') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new Name($xml);
            if (!isset($this->names)) {
                $this->names = array();
            }
            array_push($this->names, $child);
            $happened = true;
        }
        else if (($xml->localName == 'fact') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new Fact($xml);
            if (!isset($this->facts)) {
                $this->facts = array();
            }
            array_push($this->facts, $child);
            $happened = true;
        }
        else if (($xml->localName == 'field') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new Field($xml);
            if (!isset($this->fields)) {
                $this->fields = array();
            }
            array_push($this->fields, $child);
            $happened = true;
        }
        else if (($xml->localName == 'display') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new DisplayProperties($xml);
            $this->displayExtension = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of Person from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute(\XMLReader $xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'principal') && (empty($xml->namespaceURI))) {
            $this->principal = $xml->value;
            return true;
        }
        else if (($xml->localName == 'private') && (empty($xml->namespaceURI))) {
            $this->private = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes this Person to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     *
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml(\XMLWriter $writer, $includeNamespaces = true)
    {
        $writer->startElementNS('gx', 'person', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this Person to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents(\XMLWriter $writer)
    {
        if ($this->principal) {
            $writer->writeAttribute('principal', $this->principal);
        }
        if ($this->private) {
            $writer->writeAttribute('private', $this->private);
        }
        parent::writeXmlContents($writer);
        if ($this->living) {
            $writer->startElementNs('gx', 'living', null);
            $writer->text($this->living);
            $writer->endElement();
        }
        if ($this->gender) {
            $writer->startElementNs('gx', 'gender', null);
            $this->gender->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->names) {
            foreach ($this->names as $i => $x) {
                $writer->startElementNs('gx', 'name', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->facts) {
            foreach ($this->facts as $i => $x) {
                $writer->startElementNs('gx', 'fact', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->fields) {
            foreach ($this->fields as $i => $x) {
                $writer->startElementNs('gx', 'field', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->displayExtension) {
            $writer->startElementNs('gx', 'display', null);
            $this->displayExtension->writeXmlContents($writer);
            $writer->endElement();
        }
    }

    /**
     * Embed the specified person into this one.
     *
     * @param ExtensibleData $person assumes \Gedcomx\Conclusion\Person or a subclass
     */
    public function embed(ExtensibleData $person) {
        if( $this->private == null ){
            $this->private = $person->isPrivate();
        }
        $this->living = $this->living == null ? $person->isLiving() : $this->living;
        $this->principal = $this->principal == null ? $person->principal : $this->principal;
        $this->gender = $this->gender == null ? $person->gender : $this->gender;
        if ($this->displayExtension != null && $person->displayExtension != null) {
            $this->displayExtension->embed($person->getDisplayExtension());
        }
        else if ($person->displayExtension != null) {
            $this->displayExtension = $person->displayExtension;
        }
        if ($person->names != null) {
            if( $this->names == null ){
                $this->names = array();
            }
            $this->names = array_merge($this->names, $person->names);
        }
        if ($person->facts != null) {
            if( $this->facts == null ){
                $this->facts = array();
            }
            $this->facts = array_merge($this->facts, $person->facts);
        }
        if ($person->fields != null) {
            if( $this->fields == null ){
                $this->fields = array();
            }
            $this->fields = array_merge($this->fields, $person->facts);
        }
        parent::embed($person);

    }
}
