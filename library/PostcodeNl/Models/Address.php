<?php
class PostcodeNl_Model_Address implements ArrayAccess {
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
     * House number of a perceel. In case of a Postbus match the house number will always be 0. Range: 0-99999
     *
     * @return int
     */
    public function getHousNumber()
    {
        return $this->offsetGet('houseNumber');
    }

    /**
     * Addition of the house number to uniquely define a location. These additions are officially recognized by the
     * municipality. Null if addition not found (see houseNumberAdditions result field).
     *
     * @return string
     */
    public function getHouseNumberAddition()
    {
        return $this->offsetGet('houseNumberAddition');
    }

    /**
     * Four number neighborhood code (first part of a postcode). Range: 1000-9999 plus two character letter combination
     * (second part of a postcode). Range: "AA"-"ZZ"
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->offsetGet('postcode');
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

    /**
     * X coordinate according to Dutch Rijksdriehoeksmeting "(EPSG) 28992 Amersfoort / RD New". Values range from 0 to
     * 300000 meters. Null for PO Boxes.
     *
     * @return int
     */
    public function getRdX()
    {
        return $this->offsetGet('rdX');
    }

    /**
     * Y coordinate according to Dutch Rijksdriehoeksmeting "(EPSG) 28992 Amersfoort / RD New". Values range from
     * 300000 to 620000 meters. Null for PO Boxes.
     *
     * @return int
     */
    public function getRdY()
    {
        return $this->offsetGet('rdY');
    }

    /**
     * Latitude of address. Null for PO Boxes.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->offsetGet('latitude');
    }

    /**
     * Longitude of address. Null for PO Boxes.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->offsetGet('longitude');
    }

    /**
     * Dutch term used in BAG: "nummeraanduiding id".
     *
     * @return string
     */
    public function getBagNumberDesignationId()
    {
        return $this->offsetGet('bagNumberDesignationId');
    }

    /**
     * Dutch term used in BAG: "adresseerbaar object id". Unique identification for objects which have 'building',
     * 'house boat site', or 'mobile home site' as addressType.
     *
     * @return string
     */
    public function getBagAddressableObjectId()
    {
        return $this->offsetGet('bagAddressableObjectId');
    }

    /**
     * Type of this address. See reference for possible values.
     * @see https://api.postcode.nl/Documentation/postcodeNlTypes
     *
     * @return string
     */
    public function getAddressType()
    {
        return $this->offsetGet('addressType');
    }

    /**
     * List of all purposes (Dutch: "gebruiksdoelen"). Null or an array of text values. See reference for possible
     * values.
     * @see https://api.postcode.nl/Documentation/postcodeNlTypes
     *
     * @return strings[]
     */
    public function getPurposes()
    {
        return $this->offsetGet('purposes');
    }

    /**
     * Surface in square meters. Null for PO Boxes.
     *
     * @return int
     */
    public function getSurfaceArea()
    {
        return $this->offsetGet('surfaceArea');
    }

    /**
     * List of all house number additions having the postcode and houseNumber which was input.
     *
     * @return string[]
     */
    public function getHouseNumberAdditions()
    {
        return $this->offsetGet('houseNumberAdditions');
    }
}
