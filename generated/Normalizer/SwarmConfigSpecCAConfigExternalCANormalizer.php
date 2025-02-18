<?php

namespace Docker\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

class SwarmConfigSpecCAConfigExternalCANormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\SwarmConfigSpecCAConfigExternalCA') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\SwarmConfigSpecCAConfigExternalCA) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\SwarmConfigSpecCAConfigExternalCA();
        if (property_exists($data, 'Protocol')) {
            $object->setProtocol($data->{'Protocol'});
        }
        if (property_exists($data, 'URL')) {
            $object->setURL($data->{'URL'});
        }
        if (property_exists($data, 'Options')) {
            $value = $data->{'Options'};
            if (is_object($data->{'Options'})) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data->{'Options'} as $key => $value_1) {
                    $values[$key] = $value_1;
                }
                $value = $values;
            }
            if (is_null($data->{'Options'})) {
                $value = $data->{'Options'};
            }
            $object->setOptions($value);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getProtocol()) {
            $data->{'Protocol'} = $object->getProtocol();
        }
        if (null !== $object->getURL()) {
            $data->{'URL'} = $object->getURL();
        }
        $value = $object->getOptions();
        if (is_object($object->getOptions())) {
            $values = new \stdClass();
            foreach ($object->getOptions() as $key => $value_1) {
                $values->{$key} = $value_1;
            }
            $value = $values;
        }
        if (is_null($object->getOptions())) {
            $value = $object->getOptions();
        }
        $data->{'Options'} = $value;

        return json_encode($data);
    }
}
