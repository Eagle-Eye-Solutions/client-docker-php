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

class RegistryNormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\Registry') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\Registry) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\Registry();
        if (property_exists($data, 'Mirrors')) {
            $value = $data->{'Mirrors'};
            if (is_array($data->{'Mirrors'})) {
                $values = [];
                foreach ($data->{'Mirrors'} as $value_1) {
                    $values[] = $value_1;
                }
                $value = $values;
            }
            if (is_null($data->{'Mirrors'})) {
                $value = $data->{'Mirrors'};
            }
            $object->setMirrors($value);
        }
        if (property_exists($data, 'Name')) {
            $object->setName($data->{'Name'});
        }
        if (property_exists($data, 'Official')) {
            $object->setOfficial($data->{'Official'});
        }
        if (property_exists($data, 'Secure')) {
            $object->setSecure($data->{'Secure'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data  = new \stdClass();
        $value = $object->getMirrors();
        if (is_array($object->getMirrors())) {
            $values = [];
            foreach ($object->getMirrors() as $value_1) {
                $values[] = $value_1;
            }
            $value = $values;
        }
        if (is_null($object->getMirrors())) {
            $value = $object->getMirrors();
        }
        $data->{'Mirrors'} = $value;
        if (null !== $object->getName()) {
            $data->{'Name'} = $object->getName();
        }
        if (null !== $object->getOfficial()) {
            $data->{'Official'} = $object->getOfficial();
        }
        if (null !== $object->getSecure()) {
            $data->{'Secure'} = $object->getSecure();
        }

        return json_encode($data);
    }
}
