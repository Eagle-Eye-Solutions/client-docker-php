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

class SwarmJoinConfigNormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\SwarmJoinConfig') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\SwarmJoinConfig) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\SwarmJoinConfig();
        if (property_exists($data, 'ListenAddr')) {
            $object->setListenAddr($data->{'ListenAddr'});
        }
        if (property_exists($data, 'AdvertiseAddr')) {
            $object->setAdvertiseAddr($data->{'AdvertiseAddr'});
        }
        if (property_exists($data, 'RemoteAddrs')) {
            $value = $data->{'RemoteAddrs'};
            if (is_array($data->{'RemoteAddrs'})) {
                $values = [];
                foreach ($data->{'RemoteAddrs'} as $value_1) {
                    $values[] = $value_1;
                }
                $value = $values;
            }
            if (is_null($data->{'RemoteAddrs'})) {
                $value = $data->{'RemoteAddrs'};
            }
            $object->setRemoteAddrs($value);
        }
        if (property_exists($data, 'JoinToken')) {
            $object->setJoinToken($data->{'JoinToken'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getListenAddr()) {
            $data->{'ListenAddr'} = $object->getListenAddr();
        }
        if (null !== $object->getAdvertiseAddr()) {
            $data->{'AdvertiseAddr'} = $object->getAdvertiseAddr();
        }
        $value = $object->getRemoteAddrs();
        if (is_array($object->getRemoteAddrs())) {
            $values = [];
            foreach ($object->getRemoteAddrs() as $value_1) {
                $values[] = $value_1;
            }
            $value = $values;
        }
        if (is_null($object->getRemoteAddrs())) {
            $value = $object->getRemoteAddrs();
        }
        $data->{'RemoteAddrs'} = $value;
        if (null !== $object->getJoinToken()) {
            $data->{'JoinToken'} = $object->getJoinToken();
        }

        return json_encode($data);
    }
}
