<?php

	namespace Gedcomx\Extensions\FamilySearch\Rs\Client;

	use Gedcomx\Conclusion\Person;
	use Gedcomx\Extensions\FamilySearch\FamilySearchPlatform;
	use Gedcomx\Rs\Client\GedcomxApplicationState;
	use Gedcomx\Rs\Client\Util\HttpStatus;
	use Guzzle\Http\Client;
	use Guzzle\Http\Message\Request;
	use Guzzle\Http\Message\Response;

	class DiscussionState extends GedcomxApplicationState
	{

		public function __construct(Client $client, Request $request, Response $response, $accessToken, FamilySearchStateFactory $stateFactory)
		{
			parent::__construct($client, $request, $response, $accessToken, $stateFactory);
		}

  		protected function reconstruct(Request $request, Response $response) {
			return new DiscussionState($this->client, $request, $response, $this->accessToken, $this->stateFactory);
  		}

		/**
		 * @return FamilySearchPlatform
		 */
  		protected function loadEntity() {
			if ($this->response->getStatusCode() == HttpStatus::OK) {
				return $this->getEntity();
			}

			return null;
  		}

		protected function getScope()
		{
			return $this->getDiscussion();
		}

		/**
		 * @return Person
		 */
		public function getDiscussion()
		{
			if ($this->entity) {
				$discussions = $this->entity->getDiscussions();
				if (count($discussions) > 0) {
					return $discussions[0];
				}
			}

			return null;
		}

	}