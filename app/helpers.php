<?php

if (!function_exists('get_initials')) {
    /**
     * Get initials from a string.
     *
     * @param string $string
     * @return string
     */
    function get_initials($string)
    {
        $words = explode(' ', trim($string));
        $initials = '';

        foreach ($words as $word) {
            if (strlen($word) > 0) {
                $initials .= strtoupper($word[0]);
            }
            if (strlen($initials) === 2) {
                break;
            }
        }

        return $initials;
    }
}
