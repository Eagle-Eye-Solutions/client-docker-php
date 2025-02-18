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

class SwarmConfigSpecRaftNormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\SwarmConfigSpecRaft') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\SwarmConfigSpecRaft) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\SwarmConfigSpecRaft();
        if (property_exists($data, 'SnapshotInterval')) {
            $object->setSnapshotInterval($data->{'SnapshotInterval'});
        }
        if (property_exists($data, 'KeepOldSnapshots')) {
            $object->setKeepOldSnapshots($data->{'KeepOldSnapshots'});
        }
        if (property_exists($data, 'LogEntriesForSlowFollowers')) {
            $object->setLogEntriesForSlowFollowers($data->{'LogEntriesForSlowFollowers'});
        }
        if (property_exists($data, 'HeartbeatTick')) {
            $object->setHeartbeatTick($data->{'HeartbeatTick'});
        }
        if (property_exists($data, 'ElectionTick')) {
            $object->setElectionTick($data->{'ElectionTick'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getSnapshotInterval()) {
            $data->{'SnapshotInterval'} = $object->getSnapshotInterval();
        }
        if (null !== $object->getKeepOldSnapshots()) {
            $data->{'KeepOldSnapshots'} = $object->getKeepOldSnapshots();
        }
        if (null !== $object->getLogEntriesForSlowFollowers()) {
            $data->{'LogEntriesForSlowFollowers'} = $object->getLogEntriesForSlowFollowers();
        }
        if (null !== $object->getHeartbeatTick()) {
            $data->{'HeartbeatTick'} = $object->getHeartbeatTick();
        }
        if (null !== $object->getElectionTick()) {
            $data->{'ElectionTick'} = $object->getElectionTick();
        }

        return json_encode($data);
    }
}
