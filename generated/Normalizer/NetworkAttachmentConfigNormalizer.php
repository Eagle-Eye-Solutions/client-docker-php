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

class NetworkAttachmentConfigNormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\NetworkAttachmentConfig') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\NetworkAttachmentConfig) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\NetworkAttachmentConfig();
        if (property_exists($data, 'Target')) {
            $object->setTarget($data->{'Target'});
        }
        if (property_exists($data, 'Aliases')) {
            $value = $data->{'Aliases'};
            if (is_array($data->{'Aliases'})) {
                $values = [];
                foreach ($data->{'Aliases'} as $value_1) {
                    $values[] = $value_1;
                }
                $value = $values;
            }
            if (is_null($data->{'Aliases'})) {
                $value = $data->{'Aliases'};
            }
            $object->setAliases($value);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getTarget()) {
            $data->{'Target'} = $object->getTarget();
        }
        $value = $object->getAliases();
        if (is_array($object->getAliases())) {
            $values = [];
            foreach ($object->getAliases() as $value_1) {
                $values[] = $value_1;
            }
            $value = $values;
        }
        if (is_null($object->getAliases())) {
            $value = $object->getAliases();
        }
        $data->{'Aliases'} = $value;

        return json_encode($data);
    }
}
