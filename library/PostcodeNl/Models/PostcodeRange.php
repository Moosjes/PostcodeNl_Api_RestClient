<?php
class PostcodeNl_Model_PostcodeRange implements ArrayAccess
{
    private $container = array();

    public function __construct($properties)
    {
        $this->container = $properties;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Street name in accordance with "BAG (Basisregistraties adressen en gebouwen)". In capital and lowercase letters,
     * including punctuation marks and accents. This field is at most 80 characters in length. Filled with "Postbus in
     * case it is a range of PO boxes.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->offsetGet('street');
    }

    /**
     * Street name in NEN-5825 notation, which has a lower maximum length. In capital and lowercase letters, including
     * punctuation marks and accents. This field is at most 24 characters in length. Filled with "Postbus" in case it
     * is a range of PO boxes.
     *
     * @return string
     */
    public function getStreetNen()
    {
        return $this->offsetGet('streetNen');
    }

    /**
     * First house number or first PO box number of the range.
     *
     * @return int
     */
    public function getStartHouseNumber()
    {
        return $this->offsetGet('startHouseNumber');
    }

    /**
     * Last house number or last PO box number of the range.
     *
     * @return int
     */
    public function getEndHouseNumber()
    {
        return $this->offsetGet('endHouseNumber');
    }

    /**
     * The type of house numbers in the range: odd or even
     *
     * @return string
     */
    public function getHouseNumberType()
    {
        return $this->offsetGet('houseNumberType');
    }

    /**
     * Official city name in accordance with "BAG (Basisregistraties adressen en gebouwen)". In capital and lowercase
     * letters, including punctuation marks and accents. This field is at most 80 characters in length.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->offsetGet('city');
    }

    /**
     * City name, shortened to fit a lower maximum length. In capital and lowercase letters, including punctuation
     * marks and accents. This field is at most 24 characters in length.
     *
     * @return string
     */
    public function getCityShort()
    {
        return $this->offsetGet('cityShort');
    }

    /**
     * Municipality name in accordance with "BAG (Basisregistraties adressen en gebouwen)". In capital and lowercase
     * letters, including punctuation marks and accents. This field is at most 80 characters in length. Examples:
     * "Baarle-Nassau", "'s-Gravenhage", "Haarlemmerliede en Spaarnwoude".
     *
     * @return string
     */
    public function getMunicipality()
    {
        return $this->offsetGet('municipality');
    }

    /**
     * Municipality name, shortened to fit a lower maximum length. In capital and lowercase letters, including
     * punctuation marks and accents. This field is at most 24 characters in length. Examples: "Baarle-Nassau",
     * "'s-Gravenhage", "Haarlemmerliede c.a.".
     *
     * @return string
     */
    public function getMunicipalityShort()
    {
        return $this->offsetGet('municipalityShort');
    }

    /**
     * Official name of the province, correctly cased and with dashes where applicable.
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->offsetGet('province');
    }
}